<?php

namespace Cituao\AcademicoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;

use Cituao\AcademicoBundle\Entity\Academico;
use Cituao\CoordBundle\Entity\Asesoria;
use Cituao\AcademicoBundle\Form\Type\AcademicoType;
use Cituao\AcademicoBundle\Form\Type\AsesoriaType;

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
			case 1: $doc = $asesoria->getDocAsesor1();
				break;
			case 2: $doc = $asesoria->getDocAsesor2();
				break;
			case 3: $doc = $asesoria->getDocAsesor3();
				break;
			case 4: $doc = $asesoria->getDocAsesor4();
				break;
			case 5: $doc = $asesoria->getDocAsesor5();
				break;
			case 6: $doc = $asesoria->getDocAsesor6();
				break;
			case 7: $doc = $asesoria->getDocAsesor7();
				break;
		}

		$datos = array('id' => $id, 'numase' => $numase, 'doc' => $doc);
		return $this->render('CituaoAcademicoBundle:Default:asesoria.html.twig', array('datos' => $datos));
	}
}
