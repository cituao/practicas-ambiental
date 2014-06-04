<?php

// src/Cituao/CoordBundle/EventListener/CituaoExceptionListener.php
namespace Cituao\CoordBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class CituaoExceptionListener
{
	 protected $templating;
     protected $kernel;
		
		
	public function __construct(EngineInterface $templating, $kernel)
    {
        $this->templating = $templating;
        $this->kernel = $kernel;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
   
			// provide the better way to display a enhanced error page only in prod environment, if you want
            //if ('prod' == $this->kernel->getEnvironment()) {
					// exception object
			$exception = $event->getException();
			// new Response object
			$response = new Response();
			
			
			switch ($exception->getMessage()){
				case "ERR_ASESORIA_NO_INICIADA":
					$message = sprintf('El asesor académico aun no ha realizado la asesoria!');
					$tmperror = 'CituaoPracticanteBundle:Default:error.html.twig';
					break;
				case "ERR_EVALUACION_NO_INICIADA":
					$message = sprintf('El asesor externo no ha registrado la evaluación aun!');
					$tmperror = 'CituaoPracticanteBundle:Default:error.html.twig';
					break;			
				case "ERR_GESTION_NO_REGISTRADA":
					$message = sprintf('El practicante no ha registrado el informe de Gestión!');
					$tmperror = 'CituaoPracticanteBundle:Default:error.html.twig';
					break;
				case "ERR_NO_HAY_PROGRAMA":
					$message = sprintf('No hay programas académicos registrados en el sistema!');
					$tmperror = 'CituaoUsuarioBundle:Default:error.html.twig';
					break;
				case "ERR_PROGRAMA_REGISTRADO":
					$message = sprintf('Programa académico ya esta registrado en el sistema!');
					$tmperror = 'CituaoUsuarioBundle:Default:error.html.twig';
					break;
				case "ERR_ROLE_NO_ENCONTRADO":
					$message = sprintf('Role no encontrado!');
					$tmperror = 'CituaoPortalBundle:Default:error.html.twig';
					break;
				case "ERR_COORDINADOR_EXISTE":
					$message = sprintf('Coordinador (nombre de usuario) ya esta registrado en el sistema!');
					$tmperror = 'CituaoUsuarioBundle:Default:error.html.twig';
					break;
				case "ERR_ACADEMICO_YA_EXISTE":
					$message = sprintf('Asesor académico ya esta registrado en el sistema!');
					$tmperror = 'CituaoCoordBundle:Default:error.html.twig';
					break;
				case "ERR_USUARIO_YA_EXISTE":
					$message = sprintf('Usuario ya esta registrado en el sistema!');
					$tmperror = 'CituaoPortalBundle:Default:error.html.twig';
					break;
				default:
					//$message = sprintf('Error no identificado!');
					$message = $exception->getMessage();
					$tmperror = 'CituaoPortalBundle:Default:error.html.twig';
					break;
				
			}
			
			$error = array('message' => $message);
			// set response content
			$response->setContent(
				// create you custom template AcmeFooBundle:Exception:exception.html.twig
				$this->templating->render(
					$tmperror,
					array('exception' => $error)
				)
			);
			
			
			// HttpExceptionInterface is a special type of exception
			// that holds status code and header details
			if ($exception instanceof HttpExceptionInterface) {
				$response->setStatusCode($exception->getStatusCode());
				$response->headers->replace($exception->getHeaders());
			} else {
				$response->setStatusCode(500);
			}

			// set the new $response object to the $event
			$event->setResponse($response);

	   // You get the exception object from the received event
		  /* 
		   $exception = $event->getException();
			$message = sprintf(
				'My Error says: %s with code: %s',
				$exception->getMessage(),
				$exception->getCode()
			);

			
			// Customize your response object to display the exception details
			$response = new Response();
			$response->setContent($message);
	  $response->setStatusCode($exception->getStatusCode());
		  

			// Send the modified response object to the event
			$event->setResponse($response);
			*/
		// }
	}
}

 
