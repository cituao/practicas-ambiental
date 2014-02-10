<?php

namespace Cituao\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

		if ($this->get('security.context')->isGranted('ROLE_COORDINADOR')) {
        	//return $this->render('CituaoCoordBundle:Default:coord.html.twig');
			return $this->redirect($this->generateUrl('cituao_coord_homepage'));
    	}

        return $this->render('CituaoPortalBundle:Default:portal.html.twig');
    }

    public function palla()
    {
         return  $this->redirect(
             $this->generateUrl('www.uao.edu.co'));
		 
		 
		}
    
}
