<?php

namespace App\Controller;

use App\Security\LoginFormAuthenticator;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

     /**
     * @Route("/login/modal", name="app_login_modal", methods={"POST","GET"}, options={"expose"=true})
     */
    public function loginModal(Request $request, AuthenticationUtils $authenticationUtils, LoginFormAuthenticator $loginFormAuthenticator, UserProviderInterface $userProviderInterface): Response
    {
        $credentials = $loginFormAuthenticator->getCredentials($request);
        //$tmp_user = $loginFormAuthenticator->getUser($credentials, $userProviderInterface );
        /*if ($this->getUser()) {
             return $this->redirectToRoute('user_show');
        }*/

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        //return new Response('hhhueeee');
        return $this->render('security/login_modal.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
