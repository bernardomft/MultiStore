<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmartwatchController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Smartwatch", name="app_listSubCategoriesSmartwatch")
     */
    public function listSubCategoriesSmartwatch (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Smartwatch']);
        $productsmartwatch = [];
        $smartwatch = null;
       
        $smartwatch = $SubCategory->getSmartWatches();
        foreach ($smartwatch as $d) {
            array_push($productsmartwatch, $d->getIdProduct());
        }

        return $this->render('subcategory/smartwatch.html.twig', [
            'productsmartwatch' => $productsmartwatch,
            'smartwatch' => $smartwatch
        ]);
    }
}
