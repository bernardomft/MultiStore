<?php

namespace App\Controller;

use App\Repository\DesktopRepository;
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
     * @Route("/user/check", name="app_check_user", methods={"POST","GET"}, options={"expose"=true})
     */
    public function checkUser(){
        if($this->getUser()){
            return new Response('true');
        }
        else
            return new Response('false');
    }
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
    public function loginModal(Request $request, AuthenticationUtils $authenticationUtils, LoginFormAuthenticator $loginFormAuthenticator, UserProviderInterface $userProviderInterface, DesktopRepository $desktopRepository): Response
    {
        $credentials = $loginFormAuthenticator->getCredentials($request);
        //$tmp_user = $loginFormAuthenticator->getUser($credentials, $userProviderInterface );
        if ($this->getUser()) {
             return $this->redirectToRoute('user_show');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        //return new Response('hhhueeee');
        if($error != null){
            if($error->getMessageKey() != "Invalid CSRF token."){
                return $this->render('security/login_error.html.twig',
                            ['errorMessage' => $error->getMessageKey()]);
            }
            else
                return $this->redirectToRoute('user_show');
        }
        return $this->render('security/login_modal.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/login/get/modal", name="app_login_get_modal", methods={"POST","GET"}, options={"expose"=true})
     */
    public function getLoginModal(Request $request, AuthenticationUtils $authenticationUtils, LoginFormAuthenticator $loginFormAuthenticator, UserProviderInterface $userProviderInterface): Response
    {
       

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
