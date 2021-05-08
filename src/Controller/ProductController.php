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
     * @Route("/product/getProduct/{subcat}/{id}", name="app_getProduct")
     */
    public function getProduct(string $subcat, int $id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(['id' => $id]);
        $category = $product->getIdCategory();
        if($subcat == 'PCSobremesa'){
            $desktop = $product->getDesktops();
            return $this->render('desktop/desktop.html.twig', [
            'product' => $product,
            'desktop' => $desktop[0]
            ]);
        }else if($subcat == 'Portatil'){
            $laptop = $product->getLaptops();
            return $this->render('laptop/laptop.html.twig', [
            'product' => $product,
            'laptop' => $laptop[0]
            ]);
        }
        else if($subcat == 'Teclado'){
            $keyboard = $product->getkeyboards();
            return $this->render('keyboard/keyboard.html.twig', [
            'product' => $product,
            'keyboard' => $keyboard[0]
            ]);
        }
        else if($subcat == 'Raton'){
            $mouse = $product->getMouse();
            return $this->render('mouse/mouse.html.twig', [
            'product' => $product,
            'mouse' => $mouse[0]
            ]);
        }
        $desktop = $product->getDesktops();
        return $this->render('desktop/desktop.html.twig', [
            'product' => $product,
            'desktop' => $desktop[0]
        ]);
    }
    /**
     * @Route("/listCategories/{name}", name="app_listCategories")
     */
    public function listCategories(string $name, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $name]);
        $productsDesktops = [];
        $productsLaptops = [];
        $desktops = null;
        $laptops = null;

        switch ($name) {
            case 'Ordenadores';
                $subcategories = $category->getSubCategories();
                foreach ($subcategories as $s) {
                    if ($s->getName() === 'PC/Sobremesa') {
                        $desktops = $s->getDesktops();
                        foreach ($desktops as $d) {
                            array_push($productsDesktops, $d->getIdProduct());
                        }
                    }
                    if ($s->getName() === 'Portatil') {
                        $laptops = $s->getLaptops();
                        foreach ($laptops as $l) {
                            array_push($productsLaptops, $l->getIdProduct());
                        }
                    }
                }
                //HACER UN RETURN PERSONALIZADO PARA CADA SUBCATEGORÍA
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
        if ($request->isXmlHttpRequest()) {
            $content = json_decode($request->getContent());
            $arrray_tmp = [];
            foreach ($content as $c) {
                $product = $productRepository->findOneBy(['id' => $c]);
                $tmp = $product->getName() . '/' . $product->getPicture() . '/' . $product->getPrice();
                array_push($arrray_tmp, $tmp);
            }
            return new Response(json_encode($arrray_tmp));
        }
    }
}
