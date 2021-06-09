<?php

namespace App\Controller;

use App\Repository\DesktopRepository;
use App\Repository\LaptopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(DesktopRepository $desktopRepository, LaptopRepository $laptopRepository): Response
    {
        $desktops = $desktopRepository->findAll();
        $laptops = $laptopRepository->findAll();
        $products = [];
        $products2 = [];
        for($i=0; $i<3;$i++){
            array_push($products,$desktops[$i]->getIdProduct());
            array_push($products2,$laptops[$i]->getIdProduct());
        }
        /*foreach($desktops as $d){
            array_push($products,$d->getIdProduct());
        }*/
        return $this->render('index/index.html.twig', [
            'desktops' => $desktops,
            'productsDesktops' => $products, 
            'laptops' => $laptops,
            'productLaptops' => $products2
        ]);
    }

    /**
     * @Route("/about/us", name="about")
     */
    public function aboutUs( ): Response
    {
        return $this->render('index/about.html.twig');
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
