<?php

namespace Cituao\AcademicoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;

use Cituao\AcademicoBundle\Entity\Academico;
use Cituao\AcademicoBundle\Entity\Informefinalacademico;
use Cituao\CoordBundle\Entity\Asesoria;
use Cituao\CoordBundle\Entity\Asesoria2;
use Cituao\CoordBundle\Entity\Asesoria3;
use Cituao\CoordBundle\Entity\Asesoria4;
use Cituao\CoordBundle\Entity\Asesoria5;
use Cituao\CoordBundle\Entity\Asesoria6;
use Cituao\CoordBundle\Entity\Asesoria7;
use Cituao\AcademicoBundle\Entity\Cualicuanti;
use Cituao\AcademicoBundle\Form\Type\AcademicoType;
use Cituao\AcademicoBundle\Form\Type\AsesoriaType;
use Cituao\AcademicoBundle\Form\Type\Evaluacion1Type;
use Cituao\AcademicoBundle\Form\Type\Evaluacion2Type;
use Cituao\AcademicoBundle\Form\Type\CualicuantiType;
use Cituao\AcademicoBundle\Form\Type\InformefinalType;
use Cituao\AcademicoBundle\Form\Type\ProyectoFinalType;
use Cituao\AcademicoBundle\Form\Type\VisitapType;
use Cituao\AcademicoBundle\Form\Type\ActaType;
use Cituao\ExternoBundle\Entity\Evaluacion1;
use Cituao\ExternoBundle\Entity\Evaluacion2;
use Cituao\ExternoBundle\Entity\Acta;

class DefaultController extends Controller
{
	//*********************************************************************************************
	//muestra el home de inicio del asesor academico es igual al método practicantes
	//**********************************************************************************************
    public function indexAction()
	{
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();

		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneByci($ci);
		$em = $this->getDoctrine()->getManager();

		$estado = 1; //estado en proceso
		//contamos cuentos practicantes tiene el asesor externo 
		$query = $em->createQuery(
			'SELECT COUNT(p.id) FROM CituaoCoordBundle:Practicante p WHERE p.academico= :id  AND p.estado= :estado'
			)->setParameter('id',$academico->getId())
			->setParameter('estado', $estado);
		$numeroPracticantes=$query->getSingleScalarResult();
        
		$datos = array('numeroPracticantes' => $numeroPracticantes); 
		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$query = $repository->createQueryBuilder('p')
				->where('p.academico = :id_aca')
				->andWhere('p.estado = :estado')
				->setParameter('id_aca', $academico->getId())
				->setParameter('estado', $estado)
				->getQuery();
		
		$listaPracticantes = $query->getResult();
		
		if (!$listaPracticantes) {
			$msgerr = array('descripcion'=>'No hay practicantes registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		//$programa=$academico->getPrograma();
		return $this->render('CituaoAcademicoBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes,  'msgerr' => $msgerr, 'datos' => $datos));
	}
	

	/********************************************************/
	//Muestra y modifica un asesor academico registrado en la base de datos
	/********************************************************/		
	public function actualizarAction(){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));
		
        $formulario = $this->createForm(new AcademicoType(), $academico);
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			$academico->upload();
            // Completar las propiedades que el usuario no rellena en el formulario
			//if ($academico->getFile() == NULL)  $academico->setPath('user.jpeg');
            $em->persist($academico);
            $em->flush();
            
            return $this->redirect($this->generateUrl('cituao_academico_homepage'));
        }
		//$programa=$academico->getPrograma();
        return $this->render('CituaoAcademicoBundle:Default:academico.html.twig', array('formulario' => $formulario->createView(),   'academico' => $academico ));
	}	
	
	//*******************************************************/
	//Listar los practicantes del asesor academico
	/********************************************************/	
	public function practicantesAction(){
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();

		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneByci($ci);
		$em = $this->getDoctrine()->getManager();

		$estado = 1; //estado en proceso
		//contamos cuentos practicantes tiene el asesor externo 
		$query = $em->createQuery(
			'SELECT COUNT(p.id) FROM CituaoCoordBundle:Practicante p WHERE p.academico= :id  AND p.estado= :estado'
			)->setParameter('id',$academico->getId())
			->setParameter('estado', $estado);
		$numeroPracticantes=$query->getSingleScalarResult();
        
		$datos = array('numeroPracticantes' => $numeroPracticantes); 
		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$query = $repository->createQueryBuilder('p')
				->where('p.academico = :id_aca')
				->andWhere('p.estado = :estado')
				->setParameter('id_aca', $academico->getId())
				->setParameter('estado', $estado)
				->getQuery();
		
		$listaPracticantes = $query->getResult();
		
		if (!$listaPracticantes) {
			$msgerr = array('descripcion'=>'No hay practicantes registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		//$programa=$academico->getPrograma();
		return $this->render('CituaoAcademicoBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes,  'msgerr' => $msgerr, 'datos' => $datos));
	}
	

	//*****************************************************************/
	//Mostrar el cronograma comun entre practicante y academico
	/******************************************************************/	
	public function cronogramaAction($id){
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));
		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('id' => $id));

		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
	            'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.academico =:id_aca AND c.practicante =:id_pra');
		$query->setParameter('id_aca',$academico->getId());
		$query->setParameter('id_pra',$id);
		$cronograma = $query->getOneOrNullResult();

		//buscamos el cronograma del asesor externo
    	$query = $em->createQuery(
    		'SELECT c FROM CituaoExternoBundle:Cronogramaexterno c WHERE c.externo =:id_ext AND c.practicante =:id_pra');
    	$query->setParameter('id_ext',$practicante->getExterno()->getId());
    	$query->setParameter('id_pra',$practicante->getId());
    	$cronogramaexterno = $query->getOneOrNullResult();
		
		$programa=$practicante->getPrograma();

		// Limpiar
		$this->get('session')->getFlashBag()->add('info','');

		return $this->render('CituaoAcademicoBundle:Default:cronogramapracticante.html.twig', array('c' => $cronograma,  'programa' => $programa,  'p' => $practicante, 'e' => $cronogramaexterno ));
	}

	//******************************************************************************
	//Función para registrar una asesoría 
	// Parametros: id identificador del practicante
	//                       numase numero de asesoría a registrar 1,2,...,7
	//*******************************************************************************
	public function registrarAsesoriaAction($id, $numase){
		$peticion = $this->getRequest();

		$em = $this->getDoctrine()->getManager();
		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));

		//asignamos el sql segun tipo de asesoria
		switch($numase){
			case 1:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 2:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria2 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 3:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria3 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 4:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria4 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 5:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria5 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 6:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria6 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 7:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria7 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
		}
		//buscamos la asesoría
		$query = $em->createQuery($qString);
		$query->setParameter('id_aca',$academico->getId());
		$query->setParameter('id_pra',$id);
		
		$asesoria = $query->getOneOrNullResult();
		//si no hay asesoria registrada creamos una instancia segun el tipo de asesoria 1,2,..7
		if ($asesoria == NULL) {
			switch($numase){
				case 1:
					$asesoria = new Asesoria();
					break;
				case 2:
					$asesoria = new Asesoria2();
					break;
				case 3:
					$asesoria = new Asesoria3();
					break;
				case 4:
					$asesoria = new Asesoria4();
					break;
				case 5:
					$asesoria = new Asesoria5();
					break;
				case 6:
					$asesoria = new Asesoria6();
					break;
				case 7:
					$asesoria = new Asesoria7();
					break;
			}
		}
		
		$formularioTipoAsesoria = new AsesoriaType();
		//se definio una propiedad para determinar que asesoria se esta registrando ver AsesoriaType
		$formularioTipoAsesoria->setNumeroAsesoria($numase);
		$formulario = $this->createForm($formularioTipoAsesoria, $asesoria);
		
		$formulario->handleRequest($peticion);

		if ($formulario->isValid()) {
			//asignamos los id relacionados con este registro de asesoria
			$asesoria->setAcademico($academico->getId());
			$asesoria->setPracticante($id);
			
			//asignamos como entregada en la tabla cronograma la asesoria
			$query = $em->createQuery(
					'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.academico =:id_aca AND c.practicante =:id_pra');
			$query->setParameter('id_aca',$academico->getId());
			$query->setParameter('id_pra',$id);
			$cronograma = $query->getOneOrNullResult();
			
			switch($numase){
				case 1: $cronograma->setListoAsesoria1(true);
					break;
				case 2: $cronograma->setListoAsesoria2(true);
					break;
				case 3: $cronograma->setListoAsesoria3(true);
					break;
				case 4: $cronograma->setListoAsesoria4(true);
					break;
				case 5: $cronograma->setListoAsesoria5(true);
					break;
				case 6: $cronograma->setListoAsesoria6(true);
					break;
				case 7: $cronograma->setListoAsesoria7(true);
					break;
			}
			$em->persist($cronograma);
			$em->persist($asesoria);
			$em->flush();
			// Crear un mensaje flash para notificar al usuario
			$this->get('session')->getFlashBag()->add('info',
				'¡Listo asesoría registrada!'
			);
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}
		$datos = array('id' => $id, 'numase' => $numase);
		
		//$programa=$academico->getPrograma();
		return $this->render('CituaoAcademicoBundle:Default:formasesoria.html.twig', array('formulario' => $formulario->createView(),  'datos' => $datos));
	}
	
	
	//***************************************************************
	//mostrar la asesoria solicitada
	//***************************************************************
	public function consultarAsesoriaAction($id, $numase) {
		$peticion = $this->getRequest();

		$em = $this->getDoctrine()->getManager();
		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));


		//buscamos la asesoría
		switch($numase){
			case 1:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 2:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria2 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 3:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria3 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 4:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria4 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 5:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria5 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 6:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria6 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
			case 7:
				$qString = 'SELECT a FROM CituaoCoordBundle:Asesoria7 a WHERE a.academico =:id_aca AND a.practicante =:id_pra';
				break;
		}

		$query = $em->createQuery($qString);
		$query->setParameter('id_aca',$academico->getId());
		$query->setParameter('id_pra',$id);
		
		$asesoria = $query->getOneOrNullResult();	

		//nos traemos la documentacion
		switch($numase){
			case 1: 
				$docase = $asesoria->getDocAsesor1();
				$docpra = $asesoria->getDocPracticante1();
				break;
			case 2: 
				$docase = $asesoria->getDocAsesor2();
				$docpra = $asesoria->getDocPracticante2();
				break;
			case 3: 
				$docase = $asesoria->getDocAsesor3();
				$docpra = $asesoria->getDocPracticante3();
				break;
			case 4: 
				$docase = $asesoria->getDocAsesor4();
				$docpra = $asesoria->getDocPracticante4();
				break;
			case 5: 
				$docase = $asesoria->getDocAsesor5();
				$docpra = $asesoria->getDocPracticante5();
				break;
			case 6: 
				$docase = $asesoria->getDocAsesor6();
				$docpra = $asesoria->getDocPracticante6();
				break;
			case 7: 
				$docase = $asesoria->getDocAsesor7();
				$docpra = $asesoria->getDocPracticante7();
				break;
		}

		$datos = array('id' => $id, 'numase' => $numase, 'docase' => $docase, 'docpra' => $docpra);
		$programa=$academico->getPrograma();
		return $this->render('CituaoAcademicoBundle:Default:asesoria.html.twig', array('datos' => $datos ,  'programa' => $programa));
	}

	//*************************************************************
	//Registrar comentario a la evaluacion 1 efectuada por el asesor externo
	//*************************************************************
	public function registrarComentarioAction($id, $numeva){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));
		//buscamos el practicante oara accesar el id del asesor externo
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('id' => $id));
		
		$externo = $practicante->getExterno();
		//buscamos si ya evaluo el asesor externo
		$query = $em->createQuery(
				'SELECT a FROM CituaoExternoBundle:Cronogramaexterno a WHERE a.practicante =:id_pra AND a.externo =:id_ext');
		$query->setParameter('id_pra',$id);
		$query->setParameter('id_ext',$externo->getId());
		
		$cronograma = $query->getOneOrNullResult();
		
		switch ($numeva){
				case 1:
					if ($cronograma->getListoEvaluacion1() == false){
						$evaluacion = new Evaluacion1();
					} else {
						$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Evaluacion1');
						$evaluacion = $repository->findOneBy(array('practicante' => $id));
					}
					$formulario = $this->createForm(new Evaluacion1Type(), $evaluacion);
				break;
				
				case 2;
					if ($cronograma->getListoEvaluacion2() == false){
						$evaluacion = new Evaluacion2();
					} else {
						$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Evaluacion2');
						$evaluacion = $repository->findOneBy(array('practicante' => $id));
					}
					$formulario = $this->createForm(new Evaluacion2Type(), $evaluacion);
				break;
		}

		$formulario->handleRequest($peticion);
		if ($formulario->isValid()) {
			//asignamos como entregada la evaluación del academico 
			$query = $em->createQuery(
					'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.practicante =:id_pra');
			$query->setParameter('id_pra',$id);
			$cronograma = $query->getOneOrNullResult();
			
			//asignamos como entregada la evaluación del externo 
			$query = $em->createQuery(
				'SELECT c FROM CituaoExternoBundle:Cronogramaexterno c WHERE c.practicante =:id_pra');
			$query->setParameter('id_pra',$id);

			$cronograma_externo = $query->getOneOrNullResult();
			
			if ($numeva == 1) {			
				$cronograma->setListoEvaluacion1(true);
				$cronograma_externo->setListoEvaluacion1(true);
			}
			else{
				$cronograma->setListoEvaluacion2(true);
				$cronograma_externo->setListoEvaluacion2(true);
			}
			
			$evaluacion->setExterno($externo->getId());
			$evaluacion->setPracticante($id);
			
			
			$em->persist($evaluacion);
			$em->persist($cronograma);
			$em->persist($cronograma_externo);
			
			$em->flush();
			// Crear un mensaje flash para notificar al usuario
			$this->get('session')->getFlashBag()->add('info',
				'¡Listo ha sido registrado la evaluación!'
			);
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}
		//$programa=$academico->getPrograma();
		$datos = array('id' => $id, 'numeva' => $numeva);
		if ($numeva == 1) 
			return $this->render('CituaoAcademicoBundle:Default:formcomentario1.html.twig', array('formulario' => $formulario->createView(),  'datos' => $datos));
		else
			return $this->render('CituaoAcademicoBundle:Default:formcomentario2.html.twig', array('formulario' => $formulario->createView(),  'datos' => $datos));
}


	//*************************************************************
	//Registrar informe cualicuanti 1,2,3  efectuada por el asesor externo
	//*************************************************************
	public function registrarCualicuantiAction($id, $numcua){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));
		//buscamos si ya fue registrado por el practicante para que el asesor academico comente
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneById($id);
		$sw = false;
		if ($practicante->getListoGestion1() == false && $numcua == 1) $sw=true;
		if ($practicante->getListoGestion2() == false && $numcua == 2) $sw=true;
		if ($practicante->getListoGestion3() == false && $numcua == 3) $sw=true;

		if ($sw == true){
			throw $this->createNotFoundException('ERR_GESTION_NO_REGISTRADA');
		}
		$query = $em->createQuery(
				'SELECT a FROM CituaoAcademicoBundle:Cualicuanti a WHERE a.practicante =:id_pra AND a.academico =:id_aca AND a.cualicuanti =:numcua');
		$query->setParameter('id_pra',$id);
		$query->setParameter('id_aca',$academico->getId());
		$query->setParameter('numcua',$numcua);
		$cualicuanti = $query->getOneOrNullResult();
		if (!$cualicuanti) $cualicuanti = new Cualicuanti();
		$formulario = $this->createForm(new CualicuantiType(), $cualicuanti);		
		$formulario->handleRequest($peticion);
		if ($formulario->isValid()) {
		
			//asignamos como entregada el informe cualicuantiN del academico 
			$query = $em->createQuery(
					'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.practicante =:id_pra');
			$query->setParameter('id_pra',$id);
			$cronograma = $query->getOneOrNullResult();
			if ($numcua == 1) 			
				$cronograma->setListoGestion1(true);
			elseif ($numcua == 2)
				$cronograma->setListoGestion2(true);
			else
				$cronograma->setListoGestion3(true);
			
			$cualicuanti->setPracticante($id);
			$cualicuanti->setAcademico($academico->getId());
			$cualicuanti->setCualicuanti($numcua);						

			$em->persist($cualicuanti);
			$em->persist($cronograma);
			$em->flush();
			// Crear un mensaje flash para notificar al usuario
			$this->get('session')->getFlashBag()->add('info',
				'¡Listo ha sido registrado el comentario gestión cualicuanti!'
			);
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}
		
		//$programa=$academico->getPrograma();
		$datos = array('id' => $id, 'numcua' => $numcua);
		return $this->render('CituaoAcademicoBundle:Default:formcualicuanti.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
}


	//************************************************
	//Asignamos como realizada la primera visita presentacion
	//************************************************
	public function registrarVisitapAction($id){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('id' => $id));
		//actualizamos el estado para el academico
		$query = $em->createQuery(
					'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.practicante =:id_pra');
			$query->setParameter('id_pra',$id);
		$cronograma = $query->getOneOrNullResult();

		$formulario = $this->createForm(new VisitapType(), $cronograma);		
		$formulario->handleRequest($peticion);
		
		if ($formulario->isValid()) {
			$cronograma->setListoVisitaP(true);
			$practicante->setListoVisitaP(true);
			$em->persist($cronograma);
			$em->persist($practicante);
		
			$em->flush();
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}
		//$programa=$academico->getPrograma();
		$datos = array('id' => $id);
		return $this->render('CituaoAcademicoBundle:Default:formvisitap.html.twig', array('formulario' => $formulario->createView(),   'datos' => $datos));
	}

	//*********************************************************************************************
	// Muestra un formulario para registrar y actualizar el informe final del asesor academico
	//**********************************************************************************************
	public function registrarInformafinalAction($id){
		$usuario = $this->get('security.context')->getToken()->getUser();
		$peticion = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $usuario->getUsername()));
		//buscamos el informe  para actualizar 
		$query = $em->createQuery(
				'SELECT i FROM CituaoAcademicoBundle:Informefinalacademico i WHERE i.practicante =:id_pra ');
		$query->setParameter('id_pra',$id);
		
		$informe = $query->getOneOrNullResult();
		//si no hay informes creamos una instancia de informe final
		if ($informe == NULL) $informe = new Informefinalacademico();
	
        $formulario = $this->createForm(new InformefinalType(), $informe);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
			// Completar las propiedades que el usuario no rellena en el formulario
			$informe->setPracticante($id);
			$informe->setAcademico($academico->getId());
			$em->persist($informe);

			$query = $em->createQuery(
					'SELECT i FROM CituaoAcademicoBundle:Cronograma i WHERE i.practicante =:id_pra ');
			$query->setParameter('id_pra',$id);
			$cronograma = $query->getOneOrNullResult();
			
			$cronograma->setListoEvaluacionFinal(true);
			$em->persist($cronograma);

			//buscar registro de cronograma del practicante y asesor externo y evaluar 
			$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
			$practicante = $repository->findOneBy(array('id' => $id));
			
			//buscamos el registro cronograma del externo y determinar si ya registro el acto de conformidad
			$query = $em->createQuery(
				'SELECT i FROM CituaoExternoBundle:Cronogramaexterno i WHERE i.practicante =:id_pra ');
			$query->setParameter('id_pra',$id);
			$cronogramaexterno = $query->getOneOrNullResult();
			
			//verificamos si el practicante entrego todo
			$practicante_entrego= false;
			// si el area del practicante es 2 y 3 no suben PDF
			if ($practicante->getArea()->getId() == 2 || $practicante->getArea()->getId() == 3){
				if ($practicante->getListoInformeFinal() == true) $practicante_entrego = true;
			}else {
				if ($practicante->getListoProyecto()) $practicante_entrego = true;
			}

			$usuario_es_inactivo = false; 
			
			
			
			
			//determinamos si practicante pasa al estado de CULMINADO
			if ($cronogramaexterno->getListoActa() == true && $practicante_entrego == true) {
				//obtenemos numero de practicantes activos			
				$numero_practicantes_activos = $academico->getActivosGeneral();			

				//si el asesor academico ya no tiene practicantes en proceso lo colocamos como usuario inactivo
								
				if ($numero_practicantes_activos == 1){
					$usuario_es_inactivo = true;
					$usuario->setIsActive(false);
					$em->persist($usuario);
				}
				//verificamos si el asesor externo pasa a usuario inactivo
				$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
				$externo = $repository->findOneBy(array('id' => $practicante->getExterno()->getId()));
				$numero_practicantes_activos = $externo->getActivos();
				if ($numero_practicantes_activos == 1){
					$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Usuario');
					$usuario_externo = $repository->findOneBy(array('username' => $practicante->getExterno()->getCi()));
					$usuario_externo->setIsActive(false);
					$em->persist($usuario_externo);
				}

				//inactivamos el estudiante
				$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Usuario');
				$usuario_practicante = $repository->findOneBy(array('username' => $practicante->getCodigo()));
				$usuario_practicante->setIsActive(false);
				$em->persist($usuario_practicante);
				//lo pasamos al estado CULMINADO
				$practicante->setEstado('2');				
			}

			$em->persist($practicante);
            $em->flush();
			// Crear un mensaje flash para notificar al usuario
			$this->get('session')->getFlashBag()->add('info',
				'¡Listo ha sido registrado la evaluación final!'
			);	

			if ($usuario_es_inactivo)
				return $this->redirect($this->generateUrl('logout'));
			else
            	return $this->redirect($this->generateUrl('cituao_academico_homepage'));
        }
		$datos = array('id' => $id);
		//$programa=$academico->getPrograma();
        return $this->render('CituaoAcademicoBundle:Default:forminformefinal.html.twig', array(
            'formulario' => $formulario->createView(), 'datos' => $datos
        ));
	}	

	//************************************************************
	//Muestra la informacion del asesor externo al practicnate
	//*************************************************************
	public function verasesorExternoAction($id){
		$usuario = $this->get('security.context')->getToken()->getUser();
		$peticion = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $usuario->getUsername()));

		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneById($id);
	
		//$programa=$academico->getPrograma();	
		return $this->render('CituaoAcademicoBundle:Default:externo.html.twig', array('externo' => $externo));
	}
	
	//************************************************************
	//Muestra la informacion del centro de practicas del practicnate
	//*************************************************************
	public function vercentroAction($id){
		$usuario = $this->get('security.context')->getToken()->getUser();
		$peticion = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $usuario->getUsername()));

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Centro');
		$centro = $repository->findOneById($id);
	
		//$programa=$academico->getPrograma();
		return $this->render('CituaoAcademicoBundle:Default:centro.html.twig', array('centro' => $centro));
	}
	
	//*******************************************************************
	//Muestra formulario para registrar el acta de conformidad
	//*******************************************************************
	public function registrarConformidadAction($id){
		$usuario = $this->get('security.context')->getToken()->getUser();
		$peticion = $this->getRequest();

		//buscamos el practicante oara accesar el id del asesor externo
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('id' => $id));
		
		$externo = $practicante->getExterno();
		$academico = $practicante->getAcademico();
		
		$em = $this->getDoctrine()->getManager();
		
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

			//cambiamos el estado del practicante a 2 de CULMINADO
			
			//evaluar las entregas por parte de los asesor académico y practicante
			$query = $em->createQuery(
					'SELECT i FROM CituaoAcademicoBundle:Cronograma i WHERE i.practicante =:id_pra ');
			$query->setParameter('id_pra',$practicante->getId());
			$cronogramacademico = $query->getOneOrNullResult();
			
			$usuario_es_inactivo = false; 
			//si existe satisfaccion inactivamos los usuarios 
			if ($acta->getSatisfaccion()) {			
				
				//verificamos si el practicante entrego todo 
				$practicante_entrego= false;
				if ($practicante->getArea()->getId() == 2 || $practicante->getArea()->getId() == 3){
					if ($practicante->getListoInformeFinal() == true) $practicante_entrego = true;
				}else {
					if ($practicante->getListoProyecto()) $practicante_entrego = true;
				}
				
				// si cumple con los requisitos lo pasamos a culminado e inactivamos academico y externo 
				if ( $cronogramacademico->getListoEvaluacionFinal() == true && $practicante_entrego == true) {
					//evaluamos si el asesor academico solo tiene este practicante activo
					$numero_practicantes_activos = $academico->getActivosGeneral();
				
					if ($numero_practicantes_activos == 1){
						$usuario->setIsActive(false);
						$usuario_es_inactivo = true; 	
						$em->persist($usuario);
					}
						
					$numero_practicantes_activos = 0;
					
					//verificamos si el asesor externo pasa a usuario inactivo
					$numero_practicantes_activos = $externo->getActivos();
					if ($numero_practicantes_activos == 1){
						$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Usuario');
						$usuario_externo = $repository->findOneBy(array('username' => $externo->getCi()));
						$usuario_externo->setIsActive(false);
						$em->persist($usuario_externo);
					}
					//inactivamos el estudiante
					$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Usuario');
					$usuario_practicante = $repository->findOneBy(array('username' => $practicante->getCodigo()));
					$usuario_practicante->setIsActive(false);
					$em->persist($usuario_practicante);
					
					$practicante->setEstado('2');
					$em->persist($practicante);
				}
			}	
				
			$em->flush();
			// Crear un mensaje flash para notificar al usuario
			$this->get('session')->getFlashBag()->add('info',
				'¡Listo acta de conformidad registrada!'
			);		
			if ($usuario_es_inactivo)	
				return $this->redirect($this->generateUrl('logout'));
			else
				return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}
		$datos = array('id' => $id);
		return $this->render('CituaoAcademicoBundle:Default:formacta.html.twig', array(
			'formulario' => $formulario->createView(), 'datos' => $datos
			));

	}

	//************************************************
	//Muestra formulario para confirmar entrega de proyecto final
	//************************************************
	public function registrarProyectoFinalAction($id){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneBy(array('ci' => $ci));

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('id' => $id));
		//actualizamos el estado para el academico
		$query = $em->createQuery(
					'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.practicante =:id_pra');
			$query->setParameter('id_pra',$id);
		$cronograma = $query->getOneOrNullResult();

		$formulario = $this->createForm(new ProyectoFinalType(), $cronograma);		
		$formulario->handleRequest($peticion);
		
		if ($formulario->isValid()) {
			$cronograma->setListoProyecto(true);
			$practicante->setListoProyecto(true);
			$em->persist($cronograma);
			$em->persist($practicante);
		
			$em->flush();
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}
		//$programa=$academico->getPrograma();
		$datos = array('id' => $id);
		return $this->render('CituaoAcademicoBundle:Default:formproyectofinal.html.twig', array('formulario' => $formulario->createView(),   'datos' => $datos));
	}
	
}
