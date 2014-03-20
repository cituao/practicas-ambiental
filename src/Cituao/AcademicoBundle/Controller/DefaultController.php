<?php

namespace Cituao\AcademicoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;

use Cituao\AcademicoBundle\Entity\Academico;
use Cituao\AcademicoBundle\Entity\Informefinalacademico;
use Cituao\CoordBundle\Entity\Asesoria;
use Cituao\AcademicoBundle\Entity\Cualicuanti;
use Cituao\AcademicoBundle\Form\Type\AcademicoType;
use Cituao\AcademicoBundle\Form\Type\AsesoriaType;
use Cituao\AcademicoBundle\Form\Type\Evaluacion1Type;
use Cituao\AcademicoBundle\Form\Type\Evaluacion2Type;
use Cituao\AcademicoBundle\Form\Type\CualicuantiType;
use Cituao\AcademicoBundle\Form\Type\InformefinalType;
use Cituao\AcademicoBundle\Form\Type\VisitapType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoAcademicoBundle:Default:index.html.twig');
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
		
        return $this->render('CituaoAcademicoBundle:Default:academico.html.twig', array('formulario' => $formulario->createView(), 'academico' => $academico ));
		
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
	
			
		$query = $em->createQuery(
                'SELECT COUNT(p.id) FROM CituaoCoordBundle:Practicante p WHERE p.academico= :id'
            )->setParameter('id',$academico->getId())
;
        $numeroPracticantes=$query->getSingleScalarResult();

		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$listaPracticantes = $repository->findByacademico($academico->getId());
		$datos = array('numeroPracticantes' => $numeroPracticantes); 
		
		if (!$listaPracticantes) {
			$msgerr = array('descripcion'=>'No hay practicantes registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		return $this->render('CituaoAcademicoBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes, 'msgerr' => $msgerr, 'datos' => $datos));
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

		
		return $this->render('CituaoAcademicoBundle:Default:cronogramapracticante.html.twig', array('c' => $cronograma, 'p' => $practicante ));
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

		//buscamos la asesoría
		$query = $em->createQuery(
				'SELECT a FROM CituaoCoordBundle:Asesoria a WHERE a.academico =:id_aca AND a.practicante =:id_pra');
		$query->setParameter('id_aca',$academico->getId());
		$query->setParameter('id_pra',$id);
		
		$asesoria = $query->getOneOrNullResult();
		//si no hay asesoria registrada creamos una instancia
		if ($asesoria == NULL) $asesoria = new Asesoria();

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
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}
		$datos = array('id' => $id, 'numase' => $numase);
		return $this->render('CituaoAcademicoBundle:Default:formasesoria.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
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
		$query = $em->createQuery(
				'SELECT a FROM CituaoCoordBundle:Asesoria a WHERE a.academico =:id_aca AND a.practicante =:id_pra');
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
		return $this->render('CituaoAcademicoBundle:Default:asesoria.html.twig', array('datos' => $datos));
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
		//DEBE HABER UNA INSTANCIA si no hay ERROR

		if (($numeva == 1 AND $cronograma->getListoEvaluacion1() == false) OR ($numeva == 2 AND $cronograma->getListoEvaluacion2() == false)){
			
			if ($numeva == 1)			
				throw $this->createNotFoundException('El asesor externo no ha registrado la evaluación #1!');
			else
				throw $this->createNotFoundException('El asesor externo no ha registrado la evaluación #2!');
			//return $this->render('CituaoAcademicoBundle:Default:index.html.twig');			
		}

		//buscamos la evaluacion
		if ($numeva == 1){
			$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Evaluacion1');
			$evaluacion = $repository->findOneBy(array('practicante' => $id));
			$formulario = $this->createForm(new Evaluacion1Type(), $evaluacion);		
		}else{
			$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Evaluacion2');
			$evaluacion = $repository->findOneBy(array('practicante' => $id));
			$formulario = $this->createForm(new Evaluacion2Type(), $evaluacion);
		}
				
		
		$formulario->handleRequest($peticion);

		if ($formulario->isValid()) {
		
			//asignamos como entregada la evaluación del academico 
			$query = $em->createQuery(
					'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.practicante =:id_pra');
			$query->setParameter('id_pra',$id);
			$cronograma = $query->getOneOrNullResult();
		
			if ($numeva == 1) 			
				$cronograma->setListoEvaluacion1(true);
			else
				$cronograma->setListoEvaluacion2(true);
			
			$em->persist($evaluacion);
			$em->persist($cronograma);
			
			$em->flush();
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}

		$datos = array('id' => $id, 'numeva' => $numeva);
		if ($numeva == 1) 
			return $this->render('CituaoAcademicoBundle:Default:formcomentario1.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
		else
			return $this->render('CituaoAcademicoBundle:Default:formcomentario2.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
			
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
			throw $this->createNotFoundException('El practicante no ha registrado el informe de Gestión!');
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
			return $this->redirect($this->generateUrl('cituao_academico_homepage'));
		}

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
		$datos = array('id' => $id);
		return $this->render('CituaoAcademicoBundle:Default:formvisitap.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
		/*
		$q = $query->update('CituaoAcademicoBundle:Cronograma', 'c')
					->set('c.listoVisitaP', true)	
					->where('c.practicante = ?1 AND c.academico = ?2')
					->setParameter(1, $id)
					->setParameter(2, $academico->getId())
					->getQuery();

		$ejecsql = $q->execute();
		
		//actualizamos el estado para el practicante
		$q = $query->update('CituaoCoordBundle:Practicante', 'c')
					->set('c.listoVisitaP', true)	
					->where('c.practicante = ?1')
					->setParameter(1, $id)
					->getQuery();

		$ejecsql = $q->execute();
	*/

		
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

            $em->flush();

            return $this->redirect($this->generateUrl('cituao_academico_homepage'));
        }
		$datos = array('id' => $id);
        return $this->render('CituaoAcademicoBundle:Default:forminformefinal.html.twig', array(
            'formulario' => $formulario->createView(), 'datos' => $datos
        ));
	
	}	

	//************************************************************
	//Muestra la informacion del asesor externo al practicnate
	//*************************************************************
	public function verasesorExternoAction($id){
		
		$repository = $this->getDoctrine()->getRepository('CituaoExternoBundle:Externo');
		$externo = $repository->findOneById($id);
	
		
		return $this->render('CituaoAcademicoBundle:Default:externo.html.twig', array('externo' => $externo));
	}
	
	//************************************************************
	//Muestra la informacion del asesor externo al practicnate
	//*************************************************************
	public function vercentroAction($id){
		
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Centro');
		$centro = $repository->findOneById($id);
	
		
		return $this->render('CituaoAcademicoBundle:Default:centro.html.twig', array('centro' => $centro));
	}
	
}
