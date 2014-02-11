<?php

namespace Cituao\CoordBundle\Controller;

use Cituao\CoordBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Cituao\CoordBundle\Entity\Practicante;
use Cituao\UsuarioBundle\Entity\Usuario;
use Cituao\CoordBundle\Form\Type\PracticanteType;
use \DateTime;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoCoordBundle:Default:coord.html.twig');
    }
	
	/********************************************************/
	//Listar los practicantes registrados en la base de datos
	/********************************************************/	
	public function practicantesAction(){
	
		$listaPracticantes = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante')->findAll();
		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes));
	}
	
	
	public function practicanteAction($ci){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();

		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('ci' => $ci));
		
		//$practicante = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante')->find($codigo);
		
        $formulario = $this->createForm(new PracticanteType(), $practicante);
        
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			
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
		//return $this->render('CituaoCoordBundle:Default:coord.html.twig');
	}

	public function cronogramaAction($ci){
		
		
		return $this->render('CituaoCoordBundle:Default:cronograma.html.twig', array("cedula"=>$ci));
	}

	public function cargarEstudiantesAction(){
		
	} 

	//SE ENCARGA DE LANZAR UN FORMULARIO PARA LA SUBIDA DEL ARCHIVO TXT CON ESTUDIANTES PARA IR A PRACTICAS PROFESIONALES
	public function uploadAction(Request $request)
	{
		$document = new Document();
		$form = $this->createFormBuilder($document)
		    ->add('name')
		    ->add('file')
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

			
			while($i < $numero_fila -1){
				$row = $filas[$i];
				$sql = explode(";",$row);
				$listaEstudiantes[$i] =  array("codigo"=> $sql[0], "apellidos"=>$sql[1], "nombres"=>$sql[2], "ci" => $sql[3], 	
														"fecha" => $sql[4], "emailInstitucional" => $sql[5] );
				$i++;
			}
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
				$usuario->setUsername($listaEstudiantes[$i]['ci']);
				$usuario->setPassword($listaEstudiantes[$i]['codigo']);
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


				$practicante->setTelefonoMovil($sad);
				$practicante->setModalidad($sad);
				$practicante->setFoto($sad);
				$practicante->setTipo($sad);
				$practicante->setEmailPersonal($sad);
				$practicante->setEstado($sad);
	
				$em->persist($practicante);
				$em->flush();
				$i++;
			}
			return $this->render('CituaoCoordBundle:Default:coord.html.twig');
		} 
		return $this->render('CituaoCoordBundle:Default:cargar_estudiantes.html.twig', array('form' => $form->createView()));
	}

	/*************************************/
	//Listar todos los asesores externos		
	/*************************************/

	public function asesoresAction(){
		$repository = $this->getDoctrine()->getRepository('ExternoBundle:Product');

		$listaAsesores = $repository->findAll();
		
		if (!$product) {
	        throw $this->createNotFoundException(
	            'No hay asesores externos registrados en la base de datos');
	    }

		return $this->render('CituaoCoordBundle:Default:externos.html.twig', array('listaAsesores' => $listaAsesores));
	} 

}
