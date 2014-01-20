<?php

namespace Cituao\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function loginAction()
    {
	/*	
	$request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
		$b = "1";
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
		$b = "2";        
	}*/

        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
	
	$b = "q";

        return $this->render(
            'CituaoUsuarioBundle:Default:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
		'bandera'	=> $b
            )
        );
   
    }

    public function cajaLoginAction($id = '')
    {
        $usuario = $this->get('security.context')->getToken()->getUser();

        $respuesta = $this->render('CituaoUsuarioBundle:Default:cajaLogin.html.twig');

        $respuesta->setMaxAge(30);

        return $respuesta;
    }




}
