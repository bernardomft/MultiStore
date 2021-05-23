<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeviceCaseController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Funda", name="app_listSubCategoriesFunda")
     */
    public function listSubCategoriesTeclado (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Funda']);
        $productCases = [];
        $cases = null;
       
        $cases = $SubCategory->getDeviceCases();
        foreach ($cases as $d) {
            array_push($productCases, $d->getIdProduct());
        }

        return $this->render('subcategory/funda.html.twig', [
            'productCases' => $productCases,
            'cases' => $cases
        ]);
    }
}
