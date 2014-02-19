<?php

namespace Cituao\AcademicoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CituaoAcademicoBundle:Default:index.html.twig', array('name' => $name));
    }
}
