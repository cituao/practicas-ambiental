<?php

namespace Cituao\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Cituao\UsuarioBundle\Entity\Usuario;
use Cituao\UsuarioBundle\Form\Type\UsuarioType;


class DefaultController extends Controller
{
    public function loginAction()
    {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        return $this->render(
            'CituaoPortalBundle:Default:portal.html.twig',
            array(
                // last username entered by the user
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error'         => $error
            )
        );
    }

	public function admAction() 
	{
		//$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Programa');
		//$programas = $repository->findAll();

		$programas = null;
		
		//si no hay asesoria registrada creamos una instancia
		if (!$programas) {
			//throw $this->createNotFoundException('ERR_NO_HAY_PROGRAMA');
			$msgerr = array('id'=>1, 'descripcion' => 'No hay programas registrados en el sistema');
		}

		return $this->render('CituaoUsuarioBundle:Default:programas.html.twig',  array('listaProgramas' => $programas, 'msgerr' => $msgerr));
  	}
	
	/********************************************************/
	// Registra y modifica un programa academico
	/********************************************************/		
	public function registrarProgramaAction(){
		return $this->render('CituaoUsuarioBundle:Default:programas.html.twig',  array('listaProgramas' => $programas, 'msgerr' => $msgerr));
	}

}
