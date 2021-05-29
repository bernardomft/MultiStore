<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderProduct;
use App\Form\OrderType;
use App\Repository\DesktopRepository;
use App\Repository\OrderRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/order")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/", name="order_index", methods={"GET"})
     */
    public function index(OrderRepository $orderRepository): Response
    {
        return $this->render('order/index.html.twig', [
            'orders' => $orderRepository->findAll(),
        ]);
    }

    /**
     * @Route("/newMenu", name="app_order_new_menu", methods={"GET","POST"})
     */
    public function newMenu(Request $request): Response
    {
        $user = $this->getUser();
        $cart = [];
        $products = [];
        $stock = [];
        $subcategory = [];
        $cart = $user->getCart();
        $products = $cart->getProduct();
        $stock = $cart->getStock();

        return $this->render('order/new.html.twig', [
            'cart' => $cart,
            'products' => $products,
            'stock' => $stock
        ]);
    }

    /**
     * @Route("/new", name="app_order_new", methods={"GET","POST"})
     */
    public function new(Request $request, DesktopRepository $desktopRepository): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $products = [];

        $street = $request->request->get('street');
        $number = $request->request->get('number');
        $floor = $request->request->get('floor');
        $door = $request->request->get('door');
        $city = $request->request->get('city');
        $zip = $request->request->get('zip');
        $region = $request->request->get('region');
        $addres = $street . " Nº" . $number . " " . $floor . " " . $door . ", ". $zip ." " . $city . " " . $region;
        
        $user = $this->getUser();
        $cart  =$user->getCart();
        $stocks = $cart->getStock();
        $products = $cart->getProduct();

        $cost = 0.0;
        $shipingCosts = 0.0;
        $order = new Order();
        $orderProduct = [];

        for($i = 0; $i<sizeof($products); $i++){
            $tmp_order_protuct = new OrderProduct();
            $tmp = $products[$i]->getPrice() - $products[$i]->getPrice() * $products[$i]->getDisscount() / 100;
            
            $cost += $tmp;
            $shipingCosts += $tmp * 0.05;

            $tmp_order_protuct->setIdOrder($order);
            $tmp_order_protuct->setAmount($stocks[$i]);
            $tmp_order_protuct->setIdProduct($products[$i]);
            $cart->removeProduct($products[$i]);
            array_push($orderProduct, $tmp_order_protuct);
            //$products[$i]->setStock
        }
        $order->setAddress($addres);
        $order->setAmount($cost);
        $order->setShippiingCosts($shipingCosts);
        $order->setState("PROCESSED");
        $order->setDate(new DateTime());
        $order->setIdUser($user);
        foreach($orderProduct as $o){
            $order->addOrderProduct($o);
            $entityManager->persist($o);
        }
        $entityManager->persist($order);
        $cart->setStock([]);
        $entityManager->persist($cart);
        $entityManager->flush();

        /*REDIRIGIR A PÁGINA DE PEDIDOS DE USUARIO */
       return $this->redirectToRoute('user_show');
    }

    /**
     * @Route("/{id}", name="order_show", methods={"GET"})
     */
    public function show(Order $order): Response
    {
        return $this->render('order/show.html.twig', [
            'order' => $order,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="order_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Order $order): Response
    {
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('order_index');
        }

        return $this->render('order/edit.html.twig', [
            'order' => $order,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="order_delete", methods={"POST"})
     */
    public function delete(Request $request, Order $order): Response
    {
        if ($this->isCsrfTokenValid('delete'.$order->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($order);
            $entityManager->flush();
        }

        return $this->redirectToRoute('order_index');
    }
}
