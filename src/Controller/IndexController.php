<?php

namespace App\Controller;

use App\Repository\DesktopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(DesktopRepository $desktopRepository): Response
    {
        $desktops = $desktopRepository->findAll();
        $products = [];
        foreach($desktops as $d){
            array_push($products,$d->getIdProduct());
        }
        return $this->render('index/index.html.twig', [
            'desktops' => $desktops,
            'products' => $products
        ]);
    }
      /**
     * @Route("/isLooged", name="app_isLooged",options={"expose"=true}, name="isLooged", methods={"POST", "GET"})
     */
    public function isLooged(): Response
    {
        if($this->getUser() != null)   
            return new Response(json_encode("TRUE"));
        else
            return new Response(json_encode("FALSE"));
    }
}
