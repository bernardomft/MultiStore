<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScreenController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Pantalla", name="app_listSubCategoriesPantalla")
     */
    public function listSubCategoriesTeclado (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Pantalla']);
        $productScreens = [];
        $screens = null;
       
        $screens = $SubCategory->getScreens();
        foreach ($screens as $d) {
            array_push($productScreens, $d->getIdProduct());
        }

        return $this->render('subcategory/pantalla.html.twig', [
            'productScreens' => $productScreens,
            'screens' => $screens
        ]);
    }
}
