<?php

namespace Cituao\AcademicoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;

use Cituao\AcademicoBundle\Entity\Academico;
use Cituao\AcademicoBundle\Form\Type\AcademicoType;


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
	
		/********************************************************/
	//Listar los practicantes del asesor academico
	/********************************************************/	
	public function practicantesAction(){
		$user = $this->get('security.context')->getToken()->getUser();
		$ci =  $user->getUsername();

		$repository = $this->getDoctrine()->getRepository('CituaoAcademicoBundle:Academico');
		$academico = $repository->findOneByci($ci);
		$repository = $this->getDoctrine()->getRepository('CituaoCoordBundle:Practicante');
		$listaPracticantes = $repository->findByacademico($academico->getId());
		
		if (!$listaPracticantes) {
			$msgerr = array('descripcion'=>'No hay practicantes registrados!','id'=>'1');
	    }else{
			$msgerr = array('descripcion'=>'','id'=>'0');
		}
		return $this->render('CituaoAcademicoBundle:Default:practicantes.html.twig', array('listaPracticantes' => $listaPracticantes, 'msgerr' => $msgerr));
	}
	
	public function cronogramaAction($codigo){
		return;
	}
}
