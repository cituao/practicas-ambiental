<?php

namespace Cituao\ExternoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cituao\ExternoBundle\Entity\Evaluacion1;
use Cituao\ExternoBundle\Entity\Evaluacion2;
use Cituao\ExternoBundle\Form\Type\Evaluacion1Type;
use Cituao\ExternoBundle\Form\Type\Evaluacion2Type;



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
	
	
	//*****************************************************************/
	//Mostrar el cronograma comun entre practicante y academico
	/******************************************************************/	
	public function cronogramaAction($id){
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneBy(array('ci' => $ci));
		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('id' => $id));

		//buscamos cronograma entre el asesor externo y el practicante
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
	            'SELECT c FROM CituaoExternoBundle:Cronogramaexterno c WHERE c.externo =:id_ext AND c.practicante =:id_pra');
		$query->setParameter('id_ext',$externo->getId());
		$query->setParameter('id_pra',$id);
		$cronograma = $query->getOneOrNullResult();

		
		return $this->render('CituaoExternoBundle:Default:cronogramapracticante.html.twig', array('c' => $cronograma, 'p' => $practicante ));
	}
	
	//*************************************************************
	//Registrar comentario a la evaluacion 1 efectuada por el asesor externo
	//*************************************************************
	public function registrarEvaluacionAction($id, $numeva){
		
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();

		// buscamos el ID del asesor externo
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneBy(array('ci' => $ci));

		//buscamos la evaluacion
		if ($numeva == 1){
			$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Evaluacion1');
			$evaluacion = $repository->findOneBy(array('practicante' => $id));
		    if ($evaluacion == NULL) $evaluacion = new Evaluacion1();
			
			$formulario = $this->createForm(new Evaluacion1Type(), $evaluacion);		
		}else{
			$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Evaluacion2');
			$evaluacion = $repository->findOneBy(array('practicante' => $id));
			if ($evaluacion == NULL) $evaluacion = new Evaluacion2();
			$evaluacion = $repository->findOneBy(array('practicante' => $id));
			$formulario = $this->createForm(new Evaluacion2Type(), $evaluacion);
		}

		$formulario->handleRequest($peticion);

		if ($formulario->isValid()) {
		
			//asignamos como entregada la evaluación del academico 
			$query = $em->createQuery(
					'SELECT c FROM CituaoExternoBundle:Cronogramaexterno c WHERE c.practicante =:id_pra AND c.externo =:id_ext');
			$query->setParameter('id_pra',$id);
			$query->setParameter('id_ext',$externo->getId());
			$cronograma = $query->getOneOrNullResult();

			$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
			$practicante = $repository->findById($id);

			if ($numeva == 1){ 			
				$cronograma->setListoEvaluacion1(true);
				$practicante->setListoVisita1(true);
			}
			else{
				$cronograma->setListoEvaluacion2(true);
				$practicante->setListoVisita2(true);
			}				

			$evaluacion->setExterno($externo->getId());
			$evaluacion->setPracticante($id);
			
			$em->persist($evaluacion);
			$em->persist($cronograma);
			
			$em->flush();
			return $this->redirect($this->generateUrl('cituao_externo_homepage'));
		}

		$datos = array('id' => $id, 'numeva' => $numeva);
		if ($numeva == 1) 
			return $this->render('CituaoExternoBundle:Default:formevaluacion1.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
		else
			return $this->render('CituaoExternoBundle:Default:formevaluacion2.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
			
}
	public function registrarConformidadAction(){


		return $this->render('CituaoExternoBundle:Default:index.html.twig');
	}
	
	
}
