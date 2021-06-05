<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Cart;
use App\Form\UserType;
use App\Repository\UserRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/menu", name="user_new_menu", methods={"GET","POST"})
     */
    public function newMenu(Request $request): Response
    {
        return $this->render('user/new_menu.html.twig');
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $userPasswordEncoderInterface): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $name = $request->request->get('name');
        $surname = $request->request->get('surname');
        $address = $request->request->get('address');
        $email = $request->request->get('email');
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $birthday = $request->request->get('birthday');

        $checkEmail = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        $checkUserName = $entityManager->getRepository(User::class)->findOneBy(['username' => $username]);
        if($checkEmail != null){
            $this->addFlash(
                'error',
                'Ya existe un usuario con esta cuenta de correo electrónico'
            );
            return $this->redirectToRoute('user_new_menu');
        }else if($checkUserName != null){
            $this->addFlash(
                'error',
                'Ya existe un usuario con este nombre de ususario'
            );
            return $this->redirectToRoute('user_new_menu');
        }
        else{
            $user = new User();
            $cart = new cart();
            $user->setRoles(['ROLE_USER']);
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setName($name);
            $user->setSurname($surname);
            $user->setAddress($address);
            $user->setBirthday(new DateTime($birthday));  
            $user->setPassword($userPasswordEncoderInterface->encodePassword($user, $password));
            $user->setCart($cart);
            $entityManager->persist($cart);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_index');
        }
    }

    /**
     * @Route("/show", name="user_show", methods={"GET"})
     */
    public function show(Request $request): Response
    {
        $user = $this->getUser();
        $orders = $user->getOrders();
        return $this->render('user/user_page.html.twig', [
            'user' => $user,
            'orders' => $orders
        ]);
    }

    /**
     * @Route("/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $name = $request->request->get('name');
        $surname = $request->request->get('surname');
        $address = $request->request->get('address');
        if($name != null && $name != "")
            $user->setName($name);
        if($surname != null && $surname != "")
            $user->setsurname($surname);
        if($address != null && $address != "")
            $user->setaddress($address);
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->redirectToRoute('user_show');
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
