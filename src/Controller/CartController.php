<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Form\CartType;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cart")
 */
class CartController extends AbstractController
{
    /**
     * @Route("/", name="cart_index", methods={"GET"})
     */
    public function index(CartRepository $cartRepository): Response
    {
        return $this->render('cart/index.html.twig', [
            'carts' => $cartRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cart_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cart = new Cart();
        $form = $this->createForm(CartType::class, $cart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cart);
            $entityManager->flush();

            return $this->redirectToRoute('cart_index');
        }

        return $this->render('cart/new.html.twig', [
            'cart' => $cart,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show", name="cart_show", methods={"GET","POST"})
     */
    public function show(Request $request): Response
    {   
        $user = $this->getUser();
        $cart = [];
        $products = [];
        $stock = [];
        $subcategory = [];
        $cart = $user->getCart();
        $products = $cart->getProduct();
        $stock = $cart->getStock();
        /*foreach($products as $p){
            array_push($subcategory, $p->getIdCategory()->getSubCategories()[0]);
        }*/
        return $this->render('cart/show.html.twig', [
            'cart' => $cart,
            'products' => $products,
            'stock' => $stock
            //'subcategory' => $subcategory
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cart_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cart $cart): Response
    {
        $form = $this->createForm(CartType::class, $cart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cart_index');
        }

        return $this->render('cart/edit.html.twig', [
            'cart' => $cart,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cart_delete", methods={"POST"})
     */
    public function delete(Request $request, Cart $cart): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cart->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cart);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cart_index');
    }

    /**
     * @Route("/delete/product/{id}", name="cart_delete_product", methods={"GET","POST"})
     */
    public function deleteProduct(int $id,Request $request, ProductRepository $productRepository): Response
    {
        $user = $this->getUser();
        $cart = $user->getCart();
        $product = $productRepository->findOneBy(['id' => $id]);
        $cart->removeProduct($product);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cart);
        $entityManager->persist($product);
        $entityManager->flush();

        return $this->redirectToRoute('cart_show');
    }

     /**
     * @Route("/AddToCart/", name="app_addToCart", options={"expose"=true}, methods={"GET","POST"})
     */
    public function cartAdd(Request $request, ProductRepository $productRepository) :RedirectResponse
    {
       if($request->isXmlHttpRequest()){
            $entityManager = $this->getDoctrine()->getManager();
            $array_tmp = [];
            
            $params=json_decode($request->getContent());
            $id=$params[0];
            $stock=$params[1];
            
            $user=$this->getUser();
            $cart=$user->getCart();
            $product = $productRepository->findOneBy(["id" => $id]);
            
            $cart->addProduct($product);
            $array_tmp=$cart->getStock();
            array_push($array_tmp,$stock);
            $cart->setStock($array_tmp);
            
            $entityManager->persist($cart);
            $entityManager->flush();
            //$this->show($request);
            return $this->redirectToRoute('cart_show');
       }
    }
}
