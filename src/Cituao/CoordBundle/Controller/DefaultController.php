<?php

namespace Cituao\CoordBundle\Controller;

use Cituao\CoordBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Cituao\CoordBundle\Entity\Practicante;
use Cituao\UsuarioBundle\Entity\Usuario;
use Cituao\UsuarioBundle\Entity\Role;
use Cituao\ExternoBundle\Entity\Externo;
use Cituao\CoordBundle\Form\Type\PracticanteType;
use Cituao\CoordBundle\Form\Type\CoordinadorType;
use Cituao\ExternoBundle\Form\Type\ExternoType;
use Cituao\AcademicoBundle\Entity\Academico;
use Cituao\AcademicoBundle\Entity\Cronograma;
use Cituao\CoordBundle\Form\Type\AcademicoType;
use Cituao\CoordBundle\Entity\Area;
use Cituao\CoordBundle\Entity\Centro;
use Cituao\CoordBundle\Form\Type\CentroType;
use Cituao\CoordBundle\Form\Type\CronogramaType;
use \DateTime;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


class DefaultController extends Controller
{
	/********************************************************/
	//home del coordinador
	/********************************************************/	
    public function indexAction()
    {
        return $this->render('CituaoCoordBundle:Default:coord.html.twig');
    }
	
	/********************************************************/
	//Listar los practicantes registrados en la base de datos
	/********************************************************/	
	public function practicantesAction(){
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$listaPracticantes = $repository->findAll();
		
		if (!$listaPracticantes) {
			$msgerr = array('descripcion'=>'No hay practicantes registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes, 'msgerr' => $msgerr));
	}

	/***************************************************************************/
	//Muestra formulario para registrar un nuevo practicante en la base de datos
	/***************************************************************************/		
	public function registrarPracticanteAction(){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		$practicante = new Practicante();
        $formulario = $this->createForm(new PracticanteType(), $practicante);
		$formulario->handleRequest($peticion);
		
        if ($formulario->isValid()) {
			$practicante->upload();	
			$practicante->setEstado("0");  //es practicante sin cronograma
			//si subio no subio foto  le carga la foto generica
			if ($practicante->getFile() == NULL) 
				$practicante->setPath('user.jpeg');
		
			// Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($practicante);


			//los roles fueron cargados de forma manual en la base de datos
			//buscamos una instancia role tipo practicante 
			$codigo = 2; //2 corresponde a practicante		
			$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Role');
			$role = $repository->findOneBy(array('id' => $codigo));

			$usuario = new Usuario();
			//cargamos todos los atributos al usuario
			$usuario->setUsername($practicante->getCodigo());
			$usuario->setPassword($practicante->getCi());
			$usuario->setSalt(md5(time()));
			$usuario->addRole($role); //cargamos el rol al coordinador

			//codificamos el password			
			$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
			$usuario->setPassword($passwordCodificado);
     		 $em->persist($usuario);

            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
        return $this->render('CituaoCoordBundle:Default:registrarpracticante.html.twig', array('formulario' => $formulario->createView()));
	}


	/********************************************************/
	//Muestra un practicante registrado en la base de datos
	/********************************************************/		
	public function practicanteAction($codigo){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));
		
				
        $formulario = $this->createForm(new PracticanteType(), $practicante);
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			$practicante->upload();				
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($practicante);
            $em->flush();

            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
        return $this->render('CituaoCoordBundle:Default:practicante.html.twig', array('formulario' => $formulario->createView(), 'practicante' => $practicante ));
	}

	/********************************************************/
	//Muestra y guarda cronograma de actividades del practicante 
	/********************************************************/		
	public function cronogramaAction($codigo){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		
		//prerequisitos para establecer un cronograma dede existir centros de prácticas registrados
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Centro');
		$centros = $repository->findAll();
		if (!$centros) {
			throw $this->createNotFoundException('Para crear un cronograma debe haber centros de práctica registrados!');
		}

		//prerequisitos para establecer un cronograma debe existir asesores externos
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externos = $repository->findAll();
		if (!$externos) {
			throw $this->createNotFoundException('Para operar con un cronograma debe haber un asesor externo registrado! Registre el asesor externo!');
		}
		
		//prerequisitos para establecer un cronograma debe existir asesores académicos
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academicos = $repository->findAll();
		if (!$academicos) {
			throw $this->createNotFoundException('Para operar con un cronograma debe haber un asesor académico registrado! Registre el asesor académico!');
		}
		
		//base de datos
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));
				
        //creamos instacia formulario para el conograma
		$formulario = $this->createForm(new CronogramaType(), $practicante);
		$formulario->handleRequest($peticion);

		// si los datos son validos guardamos cronograma para los actores        
		if ($formulario->isValid()) {
			// Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($practicante);

			//buscamos al academico para cargarle el cronograma
			$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Cronograma');
			$cronograma = $repository->find($practicante->getAcademico()->getId());


			$query = $em->createQuery(
		            'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.academico =:id_aca AND c.practicante =:id_pra');
			$query->setParameter('id_aca',$practicante->getAcademico()->getId());
			$query->setParameter('id_pra',$practicante->getId());
			$cronograma = $query->getResult();

			if (!$cronograma){
				$cronograma = new Cronograma();
				$cronograma->setPracticante($practicante->getId());
				$cronograma->setAcademico($practicante->getAcademico()->getId());
			}
			//cargamos las fechas	
			$cronograma->setFechaAsesoria1($practicante->getFechaAsesoria1());
			$cronograma->setFechaAsesoria2($practicante->getFechaAsesoria2());
			$cronograma->setFechaAsesoria3($practicante->getFechaAsesoria3());
			$cronograma->setFechaAsesoria4($practicante->getFechaAsesoria4());
			$cronograma->setFechaAsesoria5($practicante->getFechaAsesoria5());
			$cronograma->setFechaAsesoria6($practicante->getFechaAsesoria6());
			$cronograma->setFechaAsesoria7($practicante->getFechaAsesoria7());
			$cronograma->setFechaVisitaP($practicante->getFechaVisitaP());
			$cronograma->setFechaEvaluacion1($practicante->getFechaVisita1());
			$cronograma->setFechaEvaluacion2($practicante->getFechaVisita2());
			$cronograma->setFechaInformeGestion1($practicante->getFechaInformeGestion1());
			$cronograma->setFechaInformeGestion2($practicante->getFechaInformeGestion2());
			$cronograma->setFechaInformeGestion3($practicante->getFechaInformeGestion3());
			$cronograma->setFechaEvaluacionFinal($practicante->getFechaInformeFinal());	
			
			$em->persist($cronograma);
            $em->flush();

            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
        return $this->render('CituaoCoordBundle:Default:cronograma.html.twig', array('formulario' => $formulario->createView(), 'practicante' => $practicante ));
	}

	

	/********************************************************/
	//SE ENCARGA DE LANZAR UN FORMULARIO PARA LA SUBIDA DEL ARCHIVO TXT CON ESTUDIANTES PARA IR A PRACTICAS PROFESIONALES
	/********************************************************/	
	public function uploadAction(Request $request)
	{
		$document = new Document();
		$form = $this->createFormBuilder($document)
		    ->add('file')
			->add('name')
		    ->getForm();

		$form->handleRequest($request);

		if ($form->isValid()) {
			//levantar servicios de doctrine base de datos
			$em = $this->getDoctrine()->getManager();

			//se copia el archivo al directorio del servidor			
			$document->upload();

		    $em->persist($document);
		    //$em->flush();

			$archivo= $document->getAbsolutePath();		
			//bajamos el archivo a una matriz para procesar registro a registro y bajarlo a base de datos		    
			$filas = file($archivo);
			$i=0;
			$numero_fila= count($filas);	

			//procesamos la matriz separando los campos por medio del separador putno y coma
			while($i < $numero_fila -1){
				$row = $filas[$i];
				$sql = explode(";",$row);
				$listaEstudiantes[$i] =  array("codigo"=> $sql[0], "apellidos"=>$sql[1], "nombres"=>$sql[2], "ci" => $sql[3], 	
														"fecha" => $sql[4], "emailInstitucional" => $sql[5] );
				$i++;
			}
		

			//los roles fueron cargados de forma manual en la base de datos
			//buscamos una instancia role tipo practicante 
			$codigo = 2; //1 corresponde a practicantes		
			$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Role');
			$role = $repository->findOneBy(array('id' => $codigo));

			//procesamos la matriz  fila a fila creando practicantes y usuarios
			$i=0;				
			$sad = "";	
			while($i < $numero_fila -1){
				//creamos una instancia Practicante para descargar datos del CSV y guardar en la base de datos
				$practicante = new Practicante();
				//creamos una instancia de usuario para darle entrada a los practicantes como usuarios en el sistema
				$usuario = new Usuario();
				
				//viene del archivo .csv	
				//cargamos todos los atributos al practicante
				$practicante->setCodigo($listaEstudiantes[$i]['codigo']);
				$practicante->setNombres($listaEstudiantes[$i]['nombres']);
				$practicante->setApellidos($listaEstudiantes[$i]['apellidos']);
				$practicante->setEmailInstitucional($listaEstudiantes[$i]['emailInstitucional']);
				$practicante->setCi($listaEstudiantes[$i]['ci']);

				//cargamos todos los atributos al usuario
				$usuario->setUsername($listaEstudiantes[$i]['codigo']) ;
				$usuario->setPassword($listaEstudiantes[$i]['ci']);
				$usuario->setSalt(md5(time()));
				$usuario->addRole($role); //cargamos el rol al coordinador

				$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
                $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
				$usuario->setPassword($passwordCodificado);
				$usuario->setEmail($listaEstudiantes[$i]['emailInstitucional']);
				
				 $em->persist($usuario);

				 //convertimos la fecha de matricula a un objeto Date				
				$fecha = $listaEstudiantes[$i]['fecha'];
				$separa = explode("/",$fecha);
				$dia = $separa[0];
				$mes = $separa[1];
				$ano = $separa[2];
				
				$f = new \DateTime();
				$f->setDate($ano,$mes,$dia);

				$practicante->setFechaMatriculacion($f);

				//cargamos los demas datos
				//$practicante->setTelefonoMovil($sad);
				$area = new Area();
				$practicante->setArea($area);
				$practicante->setEstado(false);

				$practicante->setPath('user.jpeg');
				$em->persist($practicante);
				$em->flush();
				$i++;
			}
			return $this->render('CituaoCoordBundle:Default:coord.html.twig');
		} 
		
		$msgerr = array('id'=>'0', 'descripcion'=>' ');
		
		return $this->render('CituaoCoordBundle:Default:cargar_estudiantes.html.twig', array('form' => $form->createView() , 'msgerr' => $msgerr  ));
	}

	/*************************************/
	//Listar todos los asesores externos		
	/*************************************/
	public function asesoresAction(){
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$listaAsesores = $repository->findAll();
		
		if (!$listaAsesores) {
			$msgerr = array('descripcion'=>'No hay asesores externos registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}

		return $this->render('CituaoCoordBundle:Default:externos.html.twig', array('listaAsesores' => $listaAsesores, 'msgerr' => $msgerr));
	} 


	/*********************************************/
	//Muestra y registra un asesor externo
	/*********************************************/	
	public function registrarexternoAction()
	{
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Centro');
		$centros = $repository->findAll();
		
		if (!$centros) {
			throw $this->createNotFoundException('Para crear un nuevo asesor externo debe haber centros de práctica registrados!');
		}

    	$peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
		$externo = new Externo();
        $formulario = $this->createForm(new ExternoType(), $externo);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            // Completar las propiedades que el usuario no rellena en el formulario
			
            $em->persist($externo);

			//los roles fueron cargados de forma manual en la base de datos
			//buscamos una instancia role tipo coordinador 
			$codigo = 3; //3 codigo corresponde a coordinador		
			$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Role');
			$role = $repository->findOneBy(array('id' => $codigo));

			$usuario = new Usuario();
			//cargamos todos los atributos al usuario
			$usuario->setUsername($externo->getCi());
			$usuario->setPassword($externo->getCi());
			$usuario->setSalt(md5(time()));
			$usuario->addRole($role); //cargamos el rol al coordinador

			//codificamos el password			
			$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
			$usuario->setPassword($passwordCodificado);
     		 $em->persist($usuario);


            $em->flush();
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }

        return $this->render('CituaoCoordBundle:Default:registrarexterno.html.twig', array(
            'formulario' => $formulario->createView()
        ));
	}


	/********************************************************/
	//Muestra y modifica un asesor externo registrado en la base de datos
	/********************************************************/		
	public function externoAction($ci){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneBy(array('ci' => $ci));
        $formulario = $this->createForm(new ExternoType(), $externo);
        
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($externo);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
        return $this->render('CituaoCoordBundle:Default:externo.html.twig', array('formulario' => $formulario->createView(), 'externo' => $externo ));
		
	}

	/*************************************/
	//Listar todos los asesores ACADEMICOS		
	/*************************************/
	public function academicosAction(){
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');

		$listaAcademicos = $repository->findAll();
		
		
		if (!$listaAcademicos) {
			$msgerr = array('descripcion'=>'No hay asesores académicos registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}

		$c=0;
		foreach ($listaAcademicos as $aca){
			
			$p = $aca->getPracticantes();
			$c = $c + $p->count();
		}
		return $this->render('CituaoCoordBundle:Default:academicos.html.twig', array('listaAcademicos' => $listaAcademicos, 'msgerr' => $msgerr));
	} 


	/*********************************************/
	//registra un asesor academico
	/*********************************************/	
	public function registraracademicoAction()
	{
		$peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
		$academico = new Academico();
        $formulario = $this->createForm(new AcademicoType(), $academico);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			$academico->upload();	
			
			
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($academico);

			//los roles fueron cargados de forma manual en la base de datos
			//buscamos una instancia role tipo coordinador 
			$codigo = 4; //4 codigo corresponde a coordinador		
			$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Role');
			$role = $repository->findOneBy(array('id' => $codigo));

			$usuario = new Usuario();
			//cargamos todos los atributos al usuario
			$usuario->setUsername($academico->getCi());
			$usuario->setPassword($academico->getCi());
			$usuario->setSalt(md5(time()));
			$usuario->addRole($role); //cargamos el rol al coordinador

			//codificamos el password			
			$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
			$usuario->setPassword($passwordCodificado);
     		 $em->persist($usuario);

            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }

        return $this->render('CituaoCoordBundle:Default:registraracademico.html.twig', array(
            'formulario' => $formulario->createView()
        ));
	}

	/********************************************************/
	//Muestra y modifica un asesor externo registrado en la base de datos
	/********************************************************/		
	public function academicoAction($ci){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));
		
        $formulario = $this->createForm(new AcademicoType(), $academico);
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			$academico->upload();
            // Completar las propiedades que el usuario no rellena en el formulario
			//if ($academico->getFile() == NULL)  $academico->setPath('user.jpeg');
            $em->persist($academico);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
		
        return $this->render('CituaoCoordBundle:Default:academico.html.twig', array('formulario' => $formulario->createView(), 'academico' => $academico ));
		
	}

	/********************************************************/
	//Listar los centros de practicas registrados en la base de datos
	/********************************************************/	
	public function centrosAction(){
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Centro');
		$listaCentros = $repository->findAll();
		
		if (!$listaCentros) {
			$msgerr = array('descripcion'=>'No hay centros de prácticas registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		return $this->render('CituaoCoordBundle:Default:centros.html.twig', array('listaCentros' => $listaCentros, 'msgerr' => $msgerr));
	}

	/***************************************************************************/
	//Muestra formulario para registrar un nuevo centro de practicas en la base de datos
	/***************************************************************************/		
	public function registrarCentroAction(){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		$centro = new Centro();
        $formulario = $this->createForm(new CentroType(), $centro);
		$formulario->handleRequest($peticion);
        if ($formulario->isValid()) {
		
			// Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($centro);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
        return $this->render('CituaoCoordBundle:Default:registrarcentro.html.twig', array('formulario' => $formulario->createView()));
	}

	/********************************************************/
	//Muestra y modifica un centro de practica registrado en la base de datos
	/********************************************************/		
	public function centroAction($codigo){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Centro');
		$centro = $repository->findOneBy(array('id' => $codigo));
		
		$formulario = $this->createForm(new CentroType(), $centro);
		$formulario->handleRequest($peticion);
		
        if ($formulario->isValid()) {
			
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($centro);
            $em->flush();

            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
		
        return $this->render('CituaoCoordBundle:Default:centro.html.twig', array('formulario' => $formulario->createView(), 'centro' => $centro ));
	}
	
	/*************************************************
	funcion que recibe la peticion ajax por jquery	y	 
	retorno un json los asesores externos del centro de practicas
	seleccionado en el select 
	**************************************************/
	public function obtenerexternosporcentroAction(){
		$request = $this->getRequest();
		$codigo_id = $request->request->get('cod_centro');
		
		//$codigo_id = 2;
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery('SELECT e.id, e.nombres, e.apellidos FROM CituaoExternoBundle:Externo e WHERE e.centro = :cod_id ORDER BY e.nombres')->setParameter('cod_id',$codigo_id); 
		
		$externos = $query->getResult();
		if(!$externos){
			$exception = array('codigo' => '999', 'message' => 'no hay registros');
		}
		else{
			$exception = array('codigo' => '000', 'message' => 'si hay registros');
		}
		//return $this->render('CituaoCoordBundle:Default:prueba.html.twig', array('externos' => $externos, 'exception' => $exception ));
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new 
		JsonEncoder()));
		$json = $serializer->serialize($externos, 'json');
				
		return new Response($json);
	
	}

	/****************************************************
	/ Presenta una interfaz para crear cuentas de coordinador
	*****************************************************/
	public function configuracionAction(){
		$msgerr = array('descripcion'=>'','id'=>'0');
		return $this->render('CituaoCoordBundle:Default:configuracion.html.twig', array('msgerr' => $msgerr));	
	}

	/*****************************************************
	* Para guardar los datos de un coordinador
	******************************************************/
	public function registrarcoordinadorAction(){
		$peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
		$usuario = new Usuario();
        $formulario = $this->createForm(new CoordinadorType(), $usuario);
        $formulario->handleRequest($peticion);
		
		//los roles fueron cargados de forma manual en la base de datos
		//buscamos una instancia role tipo coordinador 
		$codigo = 1; //codigo corresponde a coordinador		
		$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Role');
		$role = $repository->findOneBy(array('id' => $codigo));

        if ($formulario->isValid()) {
			
			$usuario->setSalt(md5(time()));
			
			$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
			$usuario->setPassword($passwordCodificado);
			
    		$usuario->addRole($role); //cargamos el rol al coordinador
        
			// Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($usuario);
            $em->flush();

            
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }

        return $this->render('CituaoCoordBundle:Default:registrarcoordinador.html.twig', array(
            'formulario' => $formulario->createView()
        ));


	}

}


