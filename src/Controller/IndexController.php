<?php

namespace App\Controller;

use App\Repository\DesktopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
