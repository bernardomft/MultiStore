<?php

namespace App\Controller;

use App\Entity\Desktop;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/getCartInfo", options={"expose"=true} ,name="app_getCartInfo", methods={"POST", "GET"})
     */
    public function getCartInfo(Request $request, ProductRepository $productRepository)
    {
        if($request->isXmlHttpRequest()){
            $content = json_decode($request->getContent());
            $arrray_tmp = [];
            foreach($content as $c){
                $product = $productRepository->findOneBy(['id' => $c]);
                $tmp = $product->getName() . '/' . $product->getPicture() . '/' . $product->getPrice();
                array_push($arrray_tmp, $tmp);
            }
            return new Response(json_encode($arrray_tmp));
        }
        
    }

}
