<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeadphoneController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Auriculares", name="app_listSubCategoriesAuriculares")
     */
    public function listSubCategoriesTeclado (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Auriculares']);
        $productHeadphones = [];
        $headphones = null;
       
        $headphones = $SubCategory->getHeadphones();
        foreach ($headphones as $d) {
            array_push($productHeadphones, $d->getIdProduct());
        }

        return $this->render('subcategory/auriculares.html.twig', [
            'productHeadphones' => $productHeadphones,
            'headphones' => $headphones
        ]);
    }
}
