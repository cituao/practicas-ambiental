<?php

namespace Cituao\ExternoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
		return $this->render('CituaoExternoBundle:Default:externo.html.twig');        
		
    }
}
