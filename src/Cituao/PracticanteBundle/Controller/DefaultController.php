<?php

namespace Cituao\PracticanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cituao\CoordBundle\Entity\Practicante; 
use Cituao\PracticanteBundle\Form\Type\HojadevidaType;
use Cituao\PracticanteBundle\Form\Type\AsesoriaType;
use Cituao\AcademicoBundle\Entity\Cualicuanti;
use Cituao\PracticanteBundle\Form\Type\CualicuantiType;
use Cituao\PracticanteBundle\Entity\Informefinalpracticante;
use Cituao\PracticanteBundle\Form\Type\InformefinalType;
use Cituao\CoordBundle\Entity\Document;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CituaoPracticanteBundle:Default:index.html.twig');
    }

	public function hojadevidaAction()
	{

		$usuario = $this->get('security.context')->getToken()->getUser();
		
		$peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        //$practicante = new Practicante();
		
        $repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('ci' => $usuario->getUsername()));

        $formulario = $this->createForm(new HojadevidaType(), $practicante);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            // Completar las propiedades que el usuario no rellena en el formulario
            $em->persist($practicante);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Practicas profesionales'
            );

	    /*
            // Loguear al usuario automáticamente
            $token = new UsernamePasswordToken($usuario, null, 'frontend', $usuario->getRoles());
            $this->container->get('security.context')->setToken($token);
	    */

            return $this->redirect($this->generateUrl('cituao_practicante_homepage'));
        }

        return $this->render('CituaoPracticanteBundle:Default:hojadevida.html.twig', array(
            'formulario' => $formulario->createView()
        ));

	}	

	//*******************************************
	// Muestra el cronograma del practicante
	//*********************************************
	public function cronogramaAction(){
		$user = $this->get('security.context')->getToken()->getUser();
		$codigo =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));

		/*$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
	            'SELECT c FROM CituaoAcademicoBundle:Cronograma c WHERE c.academico =:id_aca AND c.practicante =:id_pra');
		$query->setParameter('id_aca',$academico->getId());
		$query->setParameter('id_pra',$id);
		$cronograma = $query->getOneOrNullResult();*/

		
		return $this->render('CituaoPracticanteBundle:Default:cronograma.html.twig', array('p' => $practicante));				

	}

	//******************************************************************************
	//Función para registrar una asesoría 
	// Parametros: id identificador del practicante
	//                       numase numero de asesoría a registrar 1,2,...,7
	//*******************************************************************************
	public function registrarAsesoriaAction($id, $numase){
		$peticion = $this->getRequest();

		$em = $this->getDoctrine()->getManager();
		// buscamos el practicante
		$user = $this->get('security.context')->getToken()->getUser();
		$codigo =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));

		//buscamos  si el academico ya la registro
		$query = $em->createQuery(
				'SELECT a FROM CituaoAcademicoBundle:Cronograma a WHERE a.academico =:id_aca AND a.practicante =:id_pra');
		$query->setParameter('id_aca',$practicante->getAcademico()->getId());
		$query->setParameter('id_pra',$id);
		
		$cronograma = $query->getOneOrNullResult();
		$sw = false;
		//determinamos si la asesoría ya fue escrita por el academico
		switch ($numase){
			case 1:
				if($cronograma->getListoAsesoria1()) $sw = true;
				break;
			case 2:
				if($cronograma->getListoAsesoria2()) $sw = true;
				break;
			case 3:
				if($cronograma->getListoAsesoria3()) $sw = true;
				break;
			case 4:
				if($cronograma->getListoAsesoria4()) $sw = true;
				break;
			case 5:
				if($cronograma->getListoAsesoria5()) $sw = true;
				break;
			case 6:
				if($cronograma->getListoAsesoria6()) $sw = true;
				break;
			case 7:
				if($cronograma->getListoAsesoria7()) $sw = true;
				break;
		}

		//si no hay asesoria registrada creamos una instancia
		if ($sw == false) {
			throw $this->createNotFoundException('El asesor academico aun no ha registrado la asesoría!');
		}

		
		//buscamos la asesoría debe haber una registro en la base de datos  porque paso la exceptcion anterior
		$query = $em->createQuery(
				'SELECT a FROM CituaoCoordBundle:Asesoria a WHERE a.academico =:id_aca AND a.practicante =:id_pra');
		$query->setParameter('id_aca',$practicante->getAcademico()->getId());
		$query->setParameter('id_pra',$id);
		
		$asesoria = $query->getOneOrNullResult();		

		$formularioTipoAsesoria = new AsesoriaType();
		//se definio una propiedad para determinar que asesoria se esta registrando ver AsesoriaType
		$formularioTipoAsesoria->setNumeroAsesoria($numase);
		$formulario = $this->createForm($formularioTipoAsesoria, $asesoria);
		
		$formulario->handleRequest($peticion);

		if ($formulario->isValid()) {
			//asignamos los id relacionados con este registro de asesoria
			$asesoria->setAcademico($practicante->getAcademico()->getId());
			$asesoria->setPracticante($id);
			
			//asignamos como entregada en el cronograma del practicante
			
			switch($numase){
				case 1: $practicante->setListoAsesoria1(true);
					break;
				case 2: $practicante->setListoAsesoria2(true);
					break;
				case 3: $practicante->setListoAsesoria3(true);
					break;
				case 4: $practicante->setListoAsesoria4(true);
					break;
				case 5: $practicante->setListoAsesoria5(true);
					break;
				case 6: $practicante->setListoAsesoria6(true);
					break;
				case 7: $practicante->setListoAsesoria7(true);
					break;
			}
		
			$em->persist($practicante);
			$em->persist($asesoria);
			$em->flush();
			return $this->redirect($this->generateUrl('cituao_practicante_homepage'));
		}
		$datos = array('id' => $id, 'numase' => $numase);
		return $this->render('CituaoPracticanteBundle:Default:formasesoria.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
	}
	
		//*************************************************************
	//Registrar informe cualicuanti 1,2,3  efectuada por el asesor externo
	//*************************************************************
	public function registrarCualicuantiAction($id, $numcua){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();

		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$codigo =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));
		
		//determinamos si ya fue registrado el informe en la base de datos si es positivo es una actualizacion
		$sw = false;
		switch($numcua){
			case 1:
				if($practicante->getlistoGestion1()) $sw=true;
			break;
			case 2:
				if($practicante->getlistoGestion2()) $sw=true;
			break;
			case 3:
				if($practicante->getlistoGestion3()) $sw=true;
			break;
		}

		//si ya fue registrado hacemos una instancia del informe cualicuanti para mostrar en formulario
		if ($sw) {
			$query = $em->createQuery(
					'SELECT a FROM CituaoAcademicoBundle:Cualicuanti a WHERE a.practicante =:id_pra  AND a.cualicuanti =:numcua');
			$query->setParameter('id_pra',$id);
			$query->setParameter('numcua',$numcua);
			$cualicuanti = $query->getOneOrNullResult();
		}else{
			//no hay informe cuali cuanti registrado es nuevo por tanto creamos una instancia nueva
			$cualicuanti = new Cualicuanti();
			$cualicuanti->setPracticante($id);
			$cualicuanti->setAcademico($practicante->getAcademico()->getId());
			$cualicuanti->setCualicuanti($numcua);						
		}
		
		$formulario = $this->createForm(new CualicuantiType(), $cualicuanti);		
		$formulario->handleRequest($peticion);
		
		if ($formulario->isValid()) {
			switch($numcua){
				case 1:
					$practicante->setlistoGestion1(true);
				break;
				case 2:
					$practicante->setlistoGestion2(true);
				break;
				case 3:
					$practicante->setlistoGestion3(true);
				break;
			}
			$em->persist($cualicuanti); //guardamos o actualizamos el informe cuallcuanti
			$em->persist($practicante); //actualizamos el listo
			$em->flush();
			return $this->redirect($this->generateUrl('cituao_practicante_homepage'));
		}

		$datos = array('id' => $id, 'numcua' => $numcua);
			return $this->render('CituaoPracticanteBundle:Default:formcualicuanti.html.twig', array('formulario' => $formulario->createView(), 'datos' => $datos));
	}
	
	//******************************************************************
	//Muestra la informacion del asesor academico al practicante
	//******************************************************************
	public function verasesorAcademicoAction(){
		$em = $this->getDoctrine()->getManager();

		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$codigo =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));
	
		
		return $this->render('CituaoPracticanteBundle:Default:academico.html.twig', array('academico' => $practicante->getAcademico()));
	}

	//************************************************************
	//Muestra la informacion del asesor externo al practicnate
	//*************************************************************
	public function verasesorExternoAction(){
		$em = $this->getDoctrine()->getManager();

		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$codigo =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));
	
		
		return $this->render('CituaoPracticanteBundle:Default:externo.html.twig', array('externo' => $practicante->getExterno()));
	}

	//**************************************************************
	//Muestra la informacion del centro de practica al estudiante
	//******************************************************************
	public function vercentroAction(){
		$em = $this->getDoctrine()->getManager();

		// buscamos el ID del asesor academico
		$user = $this->get('security.context')->getToken()->getUser();
		$codigo =  $user->getUsername();
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('codigo' => $codigo));
	
		
		return $this->render('CituaoPracticanteBundle:Default:centro.html.twig', array('centro' => $practicante->getCentro()));
	}
	
	//****************************************************
	// Registra y actualiza el informe final del practicante
	//****************************************************
	public function registrarInformefinalAction($id){
		$usuario = $this->get('security.context')->getToken()->getUser();
		$peticion = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$practicante = $repository->findOneBy(array('ci' => $usuario->getUsername()));
		//buscamos el informe  para actualizar 
		$query = $em->createQuery(
				'SELECT i FROM CituaoPracticanteBundle:Informefinalpracticante i WHERE i.practicante =:id_pra ');
		$query->setParameter('id_pra',$practicante->getId());
		
		$informe = $query->getOneOrNullResult();
		//si no hay informes creamos una instancia de informe final
		if ($informe == NULL) $informe = new Informefinalpracticante();
	
        $formulario = $this->createForm(new InformefinalType(), $informe);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            // Completar las propiedades que el usuario no rellena en el formulario
			$informe->setPracticante($practicante->getId());
            $practicante->setListoInformefinal(true);
			$em->persist($informe);
            $em->flush();

            return $this->redirect($this->generateUrl('cituao_practicante_homepage'));
        }
		$datos = array('id' => $id);
        return $this->render('CituaoPracticanteBundle:Default:forminformefinal.html.twig', array(
            'formulario' => $formulario->createView(), 'datos' => $datos
        ));
	}
	
	//******************************************************************
	//Muestra un formulario para subir el proyecto en formato PDF
	//*******************************************************************
	public function subirProyectoAction(){
	
		$request = $this->getRequest();
		
		$document = new Document();
		$form = $this->createFormBuilder($document)
		    ->add('file')
			->add('name')
		    ->getForm();

		$form->handleRequest($request);

		if ($form->isValid()) {
     		//levantar servicios de doctrine base de datos
			$em = $this->getDoctrine()->getManager();

			//se copia el archivo al directorio del servidor			
			$document->upload();

		    $em->persist($document);

		
			return $this->render('CituaoPracticanteBundle:Default:index.html.twig');
		}		
		
		$msgerr = array('id'=>'0', 'descripcion'=>' ');
		return $this->render('CituaoPracticanteBundle:Default:formsubirproyecto.html.twig', array('form' => $form->createView() , 'msgerr' => $msgerr  ));
	}
	
}
