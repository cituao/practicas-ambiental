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
		$token = $event->getAuthenticationToken();
        
 
	}

    public function onKernelResponse(FilterResponseEvent $event)
    {
		/*
		$sw=0;

	    if ($this->context->isGranted('ROLE_ADMIN')) {
			$portada = $this->router->generate('cituao_coord_homepage');
			$sw=1;
	    } else {
			if ($this->context->isGranted('ROLE_USER')){
				$portada = $this->router->generate('cituao_portal_homepage');
				$sw=1;
	    	}
		}
		if ($sw==1){
	    $event->setResponse(new RedirectResponse($portada));
	    $event->stopPropagation();
		}*/

	}
}
