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
		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig', $practicante);
	}
	
	
	public function practicanteAction(){
		
		$practicante = array("nombres"=>"JESUS ALBERTO", "apellidos" => "MARQUEZ ACEVEDO", "cedula" => "12502219");
		
		
		
		return $this->render('CituaoCoordBundle:Default:practicantes.html.twig', $practicante);
	}

}
