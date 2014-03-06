<?php

namespace Cituao\AcademicoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoAcademicoBundle:Default:academico.html.twig');
    }
}
