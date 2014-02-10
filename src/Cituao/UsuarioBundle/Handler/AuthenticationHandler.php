<?php
namespace Cituao\UsuarioBundle\Handler;


use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;


class AuthenticationHandler implements AuthenticationSuccessHandlerInterface,
    AuthenticationFailureHandlerInterface, LogoutSuccessHandlerInterface
{

    function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $token->getUser();
    }

    function onAuthenticationFailure(Request $request,
        AuthenticationException $exception)
    {
        var_dump($request);
        die();
    }

    public function onLogoutSuccess(Request $request)
    {
    }

}