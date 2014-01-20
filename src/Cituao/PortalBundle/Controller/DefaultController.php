<?php

namespace Cituao\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoPortalBundle:Default:portal.html.twig');
    }
}
