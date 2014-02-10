<?php

namespace Cituao\PracticanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoPracticanteBundle:Default:practicante.html.twig');
    }

	public function hojadevidaAction()
	{
		return $this->render('CituaoPracticanteBundle:Default:hojadevida.html.twig');
	}	
}
