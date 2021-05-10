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
        }else if($subcat == 'Pantalla'){
            $screen = $product->getScreens();
            return $this->render('screen/screen.html.twig', [
            'product' => $product,
            'screen' => $screen[0]
            ]);
        }else if($subcat == 'Smartwatch'){
            $smartwatch = $product->getSmartWatches();
            return $this->render('smartwatch/smartwatch.html.twig', [
            'product' => $product,
            'smartwatch' => $smartwatch[0]
            ]);
        }
        else if($subcat == 'Webcam'){
            $webcam = $product->getWebcams();
            return $this->render('webcam/webcam.html.twig', [
            'product' => $product,
            'webcam' => $webcam[0]
            ]);
        }

        ////////
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
        $productsKeyboards = [];
        $productsMouses = [];
        $productsScreens = [];
        $productSmartwatch = [];
        $productsWebcam = [];
        $desktops = null;
        $laptops = null;
        $keyboards = null;
        $mouses = null;
        $screens = null;
        $smartwatchs = null;
        $webcams = null;

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
            case 'Perifericos';
                $subcategories = $category->getSubCategories();
                foreach ($subcategories as $s) {
                    if ($s->getName() === 'Teclado') {
                        $keyboards = $s->getKeyboards();
                        foreach ($keyboards as $k) {
                            array_push($productsKeyboards, $k->getIdProduct());
                        }
                    }
                    if ($s->getName() === 'Raton') {
                        $mouses = $s->getMouse();
                        foreach ($mouses as $l) {
                            array_push($productsMouses, $l->getIdProduct());
                        }
                    }
                    if ($s->getName() === 'Pantalla') {
                        $screens = $s->getScreens();
                        foreach ($screens as $s) {
                            array_push($productsScreens, $s->getIdProduct());
                        }
                    }
                }
                //HACER UN RETURN PERSONALIZADO PARA CADA SUBCATEGORÍA
                return $this->render('product/perifericos.html.twig', [
                    'productsKeyboards' => $productsKeyboards,
                    'productsMouses' => $productsMouses,
                    'productsScreens' => $productsScreens,
                    'keyboards' => $keyboards,
                    'mouses' => $mouses,
                    'screens' => $screens
                ]);
            break;
            case 'Gadgets';
                $subcategories = $category->getSubCategories();
                foreach ($subcategories as $s) {
                    if ($s->getName() === 'Smartwatch') {
                        $smartwatchs = $s->getSmartwatches();
                        foreach ($smartwatchs as $k) {
                            array_push($productSmartwatch, $k->getIdProduct());
                        }
                    }
                    if ($s->getName() === 'Webcam') {
                        $webcams = $s->getWebcams();
                        foreach ($webcams as $l) {
                            array_push($productsWebcam, $l->getIdProduct());
                        }
                    }
                }
                //HACER UN RETURN PERSONALIZADO PARA CADA SUBCATEGORÍA
                return $this->render('product/gadgets.html.twig', [
                    'productSmartwatch' => $productSmartwatch,
                    'productsWebcam' => $productsWebcam,
                    'smartwatchs' => $smartwatchs,
                    'webcams' => $webcams
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
