<?php

namespace Cituao\UsuarioBundle\Controller;

//namespace Cituao\CoordBundle\Resources;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

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
            'CituaoUsuarioBundle:Default:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error'         => $error
		
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
