<?php

namespace Cituao\ExternoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cituao\ExternoBundle\Entity\Evaluacion1;
use Cituao\ExternoBundle\Entity\Evaluacion2;
use Cituao\ExternoBundle\Entity\Acta;
use Cituao\ExternoBundle\Form\Type\Evaluacion1Type;
use Cituao\ExternoBundle\Form\Type\Evaluacion2Type;
use Cituao\ExternoBundle\Form\Type\ExternoType;
use Cituao\ExternoBundle\Form\Type\ActaType;


class DefaultController extends Controller
{
	public function indexAction()
	{
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();

		//buscamos por cedula y recuperamos el indice
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneByci($ci);
		$em = $this->getDoctrine()->getManager();
		
		$estado=1;
		//contamos cuentos practicantes tiene el asesor externo 
		$query = $em->createQuery(
			'SELECT COUNT(p.id) FROM CituaoCoordBundle:Practicante p WHERE p.externo= :id  AND p.estado= :estado'
			)->setParameter('id',$externo->getId())
			->setParameter('estado', $estado);
		$numeroPracticantes=$query->getSingleScalarResult();

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$query = $repository->createQueryBuilder('p')
				->where('p.externo = :id_ext')
				->andWhere('p.estado = :estado')
				->setParameter('id_ext', $externo->getId())
				->setParameter('estado', $estado)
				->getQuery();
		
		$datos = array('numeroPracticantes' => $numeroPracticantes); 
		$listaPracticantes = $query->getResult();
		
		if ($listaPracticantes == NULL) {
			$msgerr = array('descripcion'=>'Aun no tiene asignado practicante!','id'=>'1');
		}else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		return $this->render('CituaoExternoBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes, 'msgerr' => $msgerr, 'datos' => $datos));
	}

	
	//*********************************************
	//Muestra formulario para ver y actualizar datos del asesor externo
	//*********************************************
	public function actualizarAction(){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneBy(array('ci' => $ci));
		
		$formulario = $this->createForm(new ExternoType($externo), $externo);
		$formulario->handleRequest($peticion);

		if ($formulario->isValid()) {
            // Completar las propiedades que el usuario no rellena en el formulario
			//if ($academico->getFile() == NULL)  $academico->setPath('user.jpeg');
			$em->persist($externo);
			$em->flush();
			return $this->redirect($this->generateUrl('cituao_externo_homepage'));
		}
		
		return $this->render('CituaoExternoBundle:Default:formexterno.html.twig', array('formulario' => $formulario->createView(), 'externo' => $externo ));
	}		
	
	//*******************************************************/
	//Listar los practicantes del asesor externo
	/********************************************************/	
	public function practicantesAction(){
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();

		//buscamos por cedula y recuperamos el indice
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneByci($ci);
		$em = $this->getDoctrine()->getManager();
		
		$estado=1;
		//contamos cuentos practicantes tiene el asesor externo 
		$query = $em->createQuery(
			'SELECT COUNT(p.id) FROM CituaoCoordBundle:Practicante p WHERE p.externo= :id  AND p.estado= :estado'
			)->setParameter('id',$externo->getId())
			->setParameter('estado', $estado);
		$numeroPracticantes=$query->getSingleScalarResult();

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$query = $repository->createQueryBuilder('p')
				->where('p.externo = :id_ext')
				->andWhere('p.estado = :estado')
				->setParameter('id_ext', $externo->getId())
				->setParameter('estado', $estado)
				->getQuery();
		
		$datos = array('numeroPracticantes' => $numeroPracticantes); 
		$listaPracticantes = $query->getResult();
		
		if ($listaPracticantes == NULL) {
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
		
		//buscamos el cronograma del asesor academico
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery(
    		'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.academico =:id_aca AND c.practicante =:id_pra');
    	$query->setParameter('id_aca',$practicante->getAcademico()->getId());
    	$query->setParameter('id_pra',$practicante->getId());
    	$academico = $query->getOneOrNullResult();

		
		return $this->render('CituaoExternoBundle:Default:cronogramapracticante.html.twig', array('c' => $cronograma, 'p' => $practicante, 'a' => $academico ));
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
				//$practicante->setListoVisita1(true);
			}
			else{
				$cronograma->setListoEvaluacion2(true);
				//$practicante->setListoVisita2(true);
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

	//************************************************************
	//Muestra la informacion del asesor academico del practicante
	//*************************************************************
	public function verasesorAcademicoAction($id){
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneById($id);
		return $this->render('CituaoExternoBundle:Default:academico.html.twig', array('academico' => $academico));
	}

	
	//*******************************************************************
	//Muestra formulario para registrar el acta de conformidad
	//*******************************************************************
	public function registrarConformidadAction($id){
		$usuario = $this->get('security.context')->getToken()->getUser();
		$peticion = $this->getRequest();

		$em = $this->getDoctrine()->getManager();
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneBy(array('ci' => $usuario->getUsername()));
		
		//buscamos el informe  para actualizar 
		$query = $em->createQuery(
			'SELECT i FROM CituaoExternoBundle:Acta i WHERE i.practicante =:id_pra ');
		$query->setParameter('id_pra',$id);
		
		$acta = $query->getOneOrNullResult();
		//si no hay informes creamos una instancia de informe final
		if ($acta == NULL) $acta = new Acta();
		
		$formulario = $this->createForm(new ActaType(), $acta);
		$formulario->handleRequest($peticion);

		if ($formulario->isValid()) {
			// Completar las propiedades que el usuario no rellena en el formulario
			$acta->setPracticante($id);
			$acta->setExterno($externo->getId());
			$em->persist($acta);

			//actualizamos el estado de entrega en el cronograma del asesor externo
			$query = $em->createQuery(
				'SELECT i FROM CituaoExternoBundle:Cronogramaexterno i WHERE i.practicante =:id_pra ');
			$query->setParameter('id_pra',$id);
			$cronograma = $query->getOneOrNullResult();
			
			$cronograma->setListoActa(true);
			$em->persist($cronograma);

			//cambiamos el estado del practicante a 2 de BAJA
			$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
			$practicante = $repository->findOneBy(array('id' => $id));
			$practicante->setEstado('2');
			$em->persist($practicante);

			$em->flush();

			return $this->redirect($this->generateUrl('cituao_externo_homepage'));
		}
		$datos = array('id' => $id);
		return $this->render('CituaoExternoBundle:Default:formacta.html.twig', array(
			'formulario' => $formulario->createView(), 'datos' => $datos
			));

	}		
}
