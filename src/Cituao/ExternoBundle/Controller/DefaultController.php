<?php

namespace Cituao\ExternoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
		return $this->render('CituaoExternoBundle:Default:index.html.twig');        
		
    }

		//*******************************************************/
	//Listar los practicantes del asesor academico
	/********************************************************/	
	public function practicantesAction(){
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();

		//buscamos por cedula y recuperamos el indice
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneByci($ci);
		$em = $this->getDoctrine()->getManager();
			
			//contamos cuentos practicantes tiene el asesor externo 
			$query = $em->createQuery(
                'SELECT COUNT(p.id) FROM CituaoCoordBundle:Practicante p WHERE p.externo= :id'
            )->setParameter('id',$externo->getId());
			
        $numeroPracticantes=$query->getSingleScalarResult();

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$listaPracticantes = $repository->findByexterno($externo->getId());
		$datos = array('numeroPracticantes' => $numeroPracticantes); 
		
		if (!$listaPracticantes) {
			$msgerr = array('descripcion'=>'Aun no tiene asignado practicante!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		return $this->render('CituaoExternoBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes, 'msgerr' => $msgerr, 'datos' => $datos));
	}
	
}
