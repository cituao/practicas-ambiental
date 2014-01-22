<?php

namespace Cituao\CoordBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoCoordBundle:Default:coord.html.twig');
    }
}
