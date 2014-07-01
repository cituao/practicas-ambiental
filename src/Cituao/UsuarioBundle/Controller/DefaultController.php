<?php

namespace Cituao\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Cituao\UsuarioBundle\Entity\Usuario;
use Cituao\UsuarioBundle\Form\Type\UsuarioType;
use Cituao\UsuarioBundle\Entity\Programa;
use Cituao\UsuarioBundle\Form\Type\ProgramaType;


class DefaultController extends Controller
{
    public function loginAction()
    {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        return $this->render(
            'CituaoPortalBundle:Default:portal.html.twig',
            array(
                // last username entered by the user
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error'         => $error
            )
        );
    }

	public function admAction() 
	{
		$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Programa');
		$programas = $repository->findAll();
		
		//si no hay asesoria registrada creamos una instancia
		if (!$programas) {
			//throw $this->createNotFoundException('ERR_NO_HAY_PROGRAMA');
			$msgerr = array('id'=>1, 'descripcion' => 'No hay programas registrados en el sistema');
		}else{
			$msgerr = array('id'=>0, 'descripcion' => 'Ok');
		}

		return $this->render('CituaoUsuarioBundle:Default:programas.html.twig',  array('listaProgramas' => $programas, 'msgerr' => $msgerr));
  	}
	
	/********************************************************/
	// Registra y modifica un programa academico
	/********************************************************/		
	public function registrarProgramaAction(){

		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();

		$programa = new Programa();

		$formulario = $this->createForm(new ProgramaType(), $programa);
		$formulario->handleRequest($peticion);

		if ($formulario->isValid()) {
			//validamos que no existe el programa
			$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Programa');
			$p = $repository->findOneBy(array('nombre' => $programa->getNombre()));

			if ($p != NULL){
				throw $this->createNotFoundException('ERR_PROGRAMA_REGISTRADO');
			}

			//validamos que no existe ese nombre de usuario			
			$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Usuario');
			$p = $repository->findOneBy(array('username' => $programa->getCoordinador()));

			if ($p != NULL){
				throw $this->createNotFoundException('ERR_COORDINADOR_EXISTE');
			}


		   // Completar las propiedades que el usuario no rellena en el formulario

			$em->persist($programa);

			//los roles fueron cargados de forma manual en la base de datos
			//buscamos una instancia role tipo coordinador 
			$codigo = 1; //codigo corresponde a coordinador		
			$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Role');
			$role = $repository->findOneBy(array('id' => $codigo));

			if ($role == NULL){
				throw $this->createNotFoundException('ERR_ROLE_NO_ENCONTRADO');
			}
			$usuario = new Usuario();
			//cargamos todos los atributos al usuario
			$usuario->setUsername($programa->getCoordinador());
			$usuario->setPassword($formulario->get('password')->getData());
			$usuario->setSalt(md5(time()));
			$usuario->addRole($role);  //cargamos el rol al coordinador

			//codificamos el password			
			$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
			$passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
			$usuario->setPassword($passwordCodificado);
			$em->persist($usuario);


			$em->flush();
			return $this->redirect($this->generateUrl('usuario_adm_homepage'));
		}

		return $this->render('CituaoUsuarioBundle:Default:registrarprograma.html.twig', array(
			'formulario' => $formulario->createView()
			));		

	}	

	//*************************************************************
	//Actualizar programa académico
	//*************************************************************
	public function actualizarProgramaAction($id){
		$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();

		$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Programa');
		$programa = $repository->findOneBy(array('id' => $id));

		$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Usuario');
		$usuario = $repository->findOneBy(array('username' => $programa->getCoordinador()));

		$formulario = $this->createForm(new ProgramaType(), $programa);		

	
		$formulario->handleRequest($peticion);
		if ($formulario->isValid()) {
			if ($usuario->getUsername() != $programa->getCoordinador()){
				$usuario->setUsername($programa->getCoordinador());
			}
			
			
			if ($usuario->getPassword() != $formulario->get('password')->getData() ){
				$usuario->setPassword($formulario->get('password')->getData());
				$usuario->setSalt(md5(time()));
				//codificamos el password			
				$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
				$passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
				$usuario->setPassword($passwordCodificado);
				$em->persist($usuario);
			}
			$em->persist($programa);
			$em->flush();

			return $this->redirect($this->generateUrl('usuario_adm_homepage'));
		}

		return $this->render('CituaoUsuarioBundle:Default:actualizarprograma.html.twig', array(
			'formulario' => $formulario->createView(), 'programa' => $programa, 'usuario' => $usuario
			));		
	}
	
	public function configuracionAction(){
	
		return $this->render('CituaoUsuarioBundle:Default:configuracion.html.twig');
		
	}
	
	public function enviarCorreoAction(){
		
		$message = \Swift_Message::newInstance()
        ->setSubject('Hello Email')
        ->setFrom('jesmqz@gmail.com')
        ->setTo('jesmarquez@hotmail.com')
        ->setBody('saludos!')
    ;
    $this->get('mailer')->send($message);
		
		
		$repository = $this->getDoctrine()->getRepository('CituaoUsuarioBundle:Programa');
		$programas = $repository->findAll();
		
		//si no hay asesoria registrada creamos una instancia
		if (!$programas) {
			//throw $this->createNotFoundException('ERR_NO_HAY_PROGRAMA');
			$msgerr = array('id'=>1, 'descripcion' => 'No hay programas registrados en el sistema');
		}else{
			$msgerr = array('id'=>0, 'descripcion' => 'Ok');
		}

		return $this->render('CituaoUsuarioBundle:Default:programas.html.twig',  array('listaProgramas' => $programas, 'msgerr' => $msgerr));
	}

}
