<?php

namespace App\Controller;

use App\Entity\Mouse;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MouseController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Raton", name="app_listSubCategoriesRaton")
     */
    public function listSubCategoriesRaton (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Raton']);
        $productMouses = [];
        $mouses = null;
       
        $mouses = $SubCategory->getMouse();
        foreach ($mouses as $d) {
            array_push($productMouses, $d->getIdProduct());
        }

        return $this->render('subcategory/raton.html.twig', [
            'productMouses' => $productMouses,
            'mouses' => $mouses
        ]);
    }
}
