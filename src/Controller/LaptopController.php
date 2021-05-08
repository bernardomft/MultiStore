<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LaptopController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Portatiles", name="app_listSubCategoriesPortatiles")
     */
    public function listSubCategoriesPortatil (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Portatil']);
        $productsLaptops = [];
        $laptops = null;
       
        $laptops = $SubCategory->getLaptops();
        foreach ($laptops as $d) {
            array_push($productsLaptops, $d->getIdProduct());
        }

        return $this->render('subcategory/portatil.html.twig', [
            'productsLaptops' => $productsLaptops,
            'laptops' => $laptops
        ]);
    }

}
