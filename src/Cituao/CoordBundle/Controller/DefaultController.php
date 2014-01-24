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
		
		$practicante = array("nombres"=>"JESUS ALBERTO", "apellidos" => "MARQUEZ ACEVEDO", "cedula" => "12502219");
		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig');
	}
	
	
	public function practicanteAction(){
		
		
		return $this->render('CituaoCoordBundle:Default:practicante.html.twig', array("cedula"=>"12502219"));
	}

	public function cronogramaAction(){
		
		
		return $this->render('CituaoCoordBundle:Default:cronograma.html.twig', array("cedula"=>"12502219"));
	}
	
	
}
