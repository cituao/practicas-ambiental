<?php

namespace Cituao\PracticanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cituao\CoordBundle\Entity\Practicante; 
use Cituao\PracticanteBundle\Form\Type\HojadevidaType;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoPracticanteBundle:Default:practicante.html.twig');
    }

	public function hojadevidaAction()
	{

		$usuario = $this->get('security.context')->getToken()->getUser();
		
		$peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        //$practicante = new Practicante();
		
        $repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('ci' => $usuario->getUsername()));

        $formulario = $this->createForm(new HojadevidaType(), $practicante);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($practicante);
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

            return $this->redirect($this->generateUrl('cituao_practicante_homepage'));
        }

        return $this->render('CituaoPracticanteBundle:Default:hojadevida.html.twig', array(
            'formulario' => $formulario->createView()
        ));

	}	
}
