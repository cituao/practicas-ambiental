<?php

namespace Cituao\CoordBundle\Controller;

use Cituao\CoordBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Cituao\CoordBundle\Entity\Practicante;
use Cituao\UsuarioBundle\Entity\Usuario;
use Cituao\ExternoBundle\Entity\Externo;
use Cituao\CoordBundle\Form\Type\PracticanteType;
use Cituao\ExternoBundle\Form\Type\ExternoType;
use Cituao\AcademicoBundle\Entity\Academico;
use Cituao\AcademicoBundle\Form\Type\AcademicoType;
use Cituao\CoordBundle\Entity\Area;

use \DateTime;

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
	/*
		$listaPracticantes = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante')->findAll();
		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes));
		*/
		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');

		$listaPracticantes = $repository->findAll();
		
		
		if (!$listaPracticantes) {
			$msgerr = array('descripcion'=>'No hay practicantes registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		
		
		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes, 'msgerr' => $msgerr));
		
		
	}

	/********************************************************/
	//Muestra formulario para registrar un nuevo practicante en la base de datos
	/********************************************************/		
	public function registrarPracticanteAction(){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();

		$practicante = new Practicante();
		
        $formulario = $this->createForm(new PracticanteType(), $practicante);
        
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			
            
				$practicante->setFechaAsesoria1($f);
				$practicante->setFechaAsesoria2($f);
				$practicante->setFechaAsesoria3($f);
				$practicante->setFechaAsesoria4($f);
				$practicante->setFechaAsesoria5($f);
				$practicante->setFechaAsesoria6($f);
				$practicante->setFechaAsesoria7($f);
				$practicante->setFechaVisitaP($f);
				$practicante->setFechaVisita1($f);
				$practicante->setFechaVisita2($f);
				$practicante->setFechaInformeGestion1($f);
				$practicante->setFechaInformeGestion2($f);
				$practicante->setFechaInformeGestion3($f);
				$practicante->setFechaInformeFinal($f);

			
			
			// Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($practicante);
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
		
		//$practicante = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante')->find($codigo);
		
        $formulario = $this->createForm(new PracticanteType(), $practicante);
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			$practicante->upload();				
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($practicante);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );
            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
        return $this->render('CituaoCoordBundle:Default:practicante.html.twig', array('formulario' => $formulario->createView(), 'practicante' => $practicante ));
	}

	/********************************************************/
	//Muestra el cronograma de actividades del practicante 
	/********************************************************/		
	public function cronogramaAction($codigo){
		$practicante = array('practicante'=>array('codigo'=>$codigo));

		
		return $this->render('CituaoCoordBundle:Default:cronograma.html.twig', $practicante);
	}

	/********************************************************/
	//por implementar
	/********************************************************/		
	public function cargarEstudiantesAction(){
		
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
		    $em->flush();

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
				
				$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
                $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
				$usuario->setPassword($passwordCodificado);
				$usuario->setEmail($listaEstudiantes[$i]['emailInstitucional']);
				
				 $em->persist($usuario);
                 $em->flush();

				
				//convertimos la fecha a un objeto Date				
				$fecha = $listaEstudiantes[$i]['fecha'];
				$separa = explode("/",$fecha);
				$dia = $separa[0];
				$mes = $separa[1];
				$ano = $separa[2];
				
				$f = new \DateTime();
				$f->setDate($ano,$mes,$dia);

				$practicante->setFechaMatriculacion($f);

				//cargamos los demas datos
				$practicante->setTelefonoMovil($sad);
				$area = new Area();
				$practicante->setArea($area);
				$practicante->setTipo($sad);
				$practicante->setEmailPersonal($sad);
				$practicante->setEstado($sad);

				$practicante->setFechaAsesoria1($f);
				$practicante->setFechaAsesoria2($f);
				$practicante->setFechaAsesoria3($f);
				$practicante->setFechaAsesoria4($f);
				$practicante->setFechaAsesoria5($f);
				$practicante->setFechaAsesoria6($f);
				$practicante->setFechaAsesoria7($f);
				$practicante->setFechaVisitaP($f);
				$practicante->setFechaVisita1($f);
				$practicante->setFechaVisita2($f);
				$practicante->setFechaInformeGestion1($f);
				$practicante->setFechaInformeGestion2($f);
				$practicante->setFechaInformeGestion3($f);
				$practicante->setFechaInformeFinal($f);
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

		$peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

		$externo = new Externo();

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

	    /*
            // Loguear al usuario automáticamente
            $token = new UsernamePasswordToken($usuario, null, 'frontend', $usuario->getRoles());
            $this->container->get('security.context')->setToken($token);
	    */

            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }

        return $this->render('CituaoCoordBundle:Default:externo.html.twig', array(
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
		
		//$practicante = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante')->find($codigo);
		
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
		//return $this->render('CituaoCoordBundle:Default:coord.html.twig');
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
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($academico);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );

	    /*
            // Loguear al usuario automáticamente
            $token = new UsernamePasswordToken($usuario, null, 'frontend', $usuario->getRoles());
            $this->container->get('security.context')->setToken($token);
	    */

            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }

        return $this->render('CituaoCoordBundle:Default:academico.html.twig', array(
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
		
		//$practicante = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante')->find($codigo);
		
        $formulario = $this->createForm(new AcademicoType(), $academico);
        
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($academico);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );


            return $this->redirect($this->generateUrl('cituao_coord_homepage'));
        }
		
        return $this->render('CituaoCoordBundle:Default:academico.html.twig', array('formulario' => $formulario->createView(), 'academico' => $academico ));
		//return $this->render('CituaoCoordBundle:Default:coord.html.twig');
	}


}
