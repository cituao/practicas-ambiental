<?php

namespace Cituao\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoPortalBundle:Default:portal.html.twig');
    }

    public function palla()
    {
         return  $this->redirect(
             $this->generateUrl('www.uao.edu.co'));
		 
		 
		}
    
}
