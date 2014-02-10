<?php

namespace Cituao\CoordBundle\Controller;

use Cituao\CoordBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Cituao\CoordBundle\Entity\Practicante;
use \DateTime;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoCoordBundle:Default:coord.html.twig');
    }
	
	public function practicantesAction(){
		
		$listaPracticantes = array( array("asignatura"=>"CS05", "codigo"=>"73456", "nombres"=>"JESUS ALBERTO", "apellidos" => "MARQUEZ ACEVEDO", 												"cedula" => "12502219"),
									array("asignatura"=>"CS05", "codigo"=>"34234", "nombres"=>"DAVID ALEJANDRO", "apellidos" => "MARQUEZ OLASCOAGA", 												"cedula" => "1123789"));

		
		$listaPracticantes = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante')->findAll();
		
		

		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes));
	}
	
	
	public function practicanteAction(){
		
		$practicante = array("nombres"=>"JESUS ALBERTO", "apellidos" => "MARQUEZ ACEVEDO", "cedula" => "12502219");
		return $this->render('CituaoCoordBundle:Default:practicante.html.twig', array('practicante'=>$practicante));
	}

	public function cronogramaAction(){
		
		
		return $this->render('CituaoCoordBundle:Default:cronograma.html.twig', array("cedula"=>"12502219"));
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
				$practicante = new Practicante();
				//viene del archivo .csv	
				$practicante->setCodigo($listaEstudiantes[$i]['codigo']);
				$practicante->setNombres($listaEstudiantes[$i]['nombres']);
				$practicante->setApellidos($listaEstudiantes[$i]['apellidos']);
				$practicante->setEmailInstitucional($listaEstudiantes[$i]['emailInstitucional']);
				$practicante->setCi($listaEstudiantes[$i]['ci']);

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
}
