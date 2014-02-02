<?php

namespace Cituao\CoordBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoCoordBundle:Default:coord.html.twig');
    }
	
	public function practicantesAction(){
		
		$listaPracticantes = array( array("asignatura"=>"CS05", "codigo"=>"73456", "nombres"=>"JESUS ALBERTO", "apellidos" => "MARQUEZ ACEVEDO", 												"cedula" => "12502219"),
									array("asignatura"=>"CS05", "codigo"=>"34234", "nombres"=>"DAVID ALEJANDRO", "apellidos" => "MARQUEZ OLASCOAGA", 												"cedula" => "1123789"));
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
		return $this->render('CituaoCoordBundle:Default:cargar_estudiantes.html.twig');
	} 
	
	
}
