<?php
namespace Cituao\UsuarioBundle\Listener;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;


class SecurityListener
{
    protected $router=null;
    protected $context=null;
    

    public function __construct(SecurityContext $context, Router $router)
    {
        $this->router = $router;
        $this->context = $context;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
		/*$token = $event->getAuthenticationToken();*/
		//$this->dispatcher->addListener(KernelEvents::RESPONSE, array($this,'onKernelResponse'));  
  
	}

    public function onKernelResponse(FilterResponseEvent $event)
    {
		   
		if ($this->context->isGranted('ROLE_ADMIN')) {
			$portada = $this->router->generate('cituao_coord_homepage');
	    } else {
			if ($this->context->isGranted('ROLE_COORDINA')){
				$portada = $this->router->generate('cituao_coord_homepage');
	    	} else {
				$portada = $this->router->generate('cituao_portal_homepage');
			}
		}
				
		$event->stopPropagation(); 
		
		/*		
		if ($this->context->isGranted('ROLE_ADMIN')){
			$event->stopPropagation();  
			$response = new RedirectResponse($this->router->generate('cituao_coord_homepage'));
			  
		} else if ($this->context->isGranted('ROLE_COORDINA')){  
			$event->stopPropagation();
			$response = new RedirectResponse($this->router->generate('cituao_coord_homepage'));  
		}  else{
			$event->stopPropagation();
			$response = new RedirectResponse($this->router->generate('cituao_portal_homepage')); 
		}
		$event->setResponse($response);  */
		  


	}
	
}
