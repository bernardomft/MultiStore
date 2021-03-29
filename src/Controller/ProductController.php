<?php

namespace App\Controller;

use App\Entity\Desktop;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ProductController extends AbstractController
{
    /**
     * @Route("/listSubCategories/{name}", name="app_listSubCategories")
     */
    public function listSubCategories(string $name, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $name]);
        $productsDesktops = [];
        $productsLaptops = [];
        $desktops = null;
        $laptops = null;

        switch ($name) {
            case 'Ordenadores';
                $subcategories = $category->getSubCategories();
                foreach($subcategories as $s){
                    if($s->getName() === 'PC/Sobremesa'){
                        $desktops = $s->getDesktops();
                        foreach($desktops as $d){
                            array_push($productsDesktops, $d->getIdProduct());
                        }
                    }
                    if($s->getName() === 'Portátil'){
                        $laptops = $s->getLaptops();
                        foreach($laptops as $l){
                            array_push($productsLaptops, $l->getIdProduct());
                        }
                    }
                }
                return $this->render('product/ordenadores.html.twig', [
                    'productsDesktops' => $productsDesktops,
                    'desktops' => $desktops,
                    'laptops' => $laptops,
                    'productsLaptops' => $productsLaptops
                ]);
            break;
        }
        return $this->render('product/index.html.twig', [

            'products' => $productsDesktops,
            'desktops' => $desktops
        ]);
    }

    /**
     * @Route("/getCartInfo/{name}", name="app_getCartInfo")
     */
    public function getCartInfo(string $name, CategoryRepository $categoryRepository): Response
    {
        
    }

}
