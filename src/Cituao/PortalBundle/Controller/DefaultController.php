<?php

namespace Cituao\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

		if ($this->get('security.context')->isGranted('ROLE_COORDINADOR')) {
        	return $this->redirect($this->generateUrl('cituao_coord_homepage'));
    	}
		else{
			if ($this->get('security.context')->isGranted('ROLE_PRACTICANTE')) {
				return $this->redirect($this->generateUrl('cituao_practicante_homepage'));
			}else{
				if ($this->get('security.context')->isGranted('ROLE_ASESOR_EXT')) {
					return $this->redirect($this->generateUrl('cituao_externo_homepage'));
				}else {
				if ($this->get('security.context')->isGranted('ROLE_ASESOR_ACA')) {
					return $this->redirect($this->generateUrl('cituao_academico_homepage'));

				}
			}
		}			
		}

        return $this->render('CituaoPortalBundle:Default:portal.html.twig', array("error"=>array("message"=>"")));
    }

    public function palla()
    {
         return  $this->redirect(
             $this->generateUrl('www.uao.edu.co'));
		 
		 
		}
    
}
