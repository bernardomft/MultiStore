<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChargerController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Cargador", name="app_listSubCategoriesCargador")
     */
    public function listSubCategoriesCargador (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Cargador']);
        $produckCharger = [];
        $charger = null;
       
        $charger = $SubCategory->getChargers();
        foreach ($charger as $d) {
            array_push($produckCharger, $d->getIdProduct());
        }

        return $this->render('subcategory/Cargador.html.twig', [
            'produckCharger' => $produckCharger,
            'charger' => $charger
        ]);
    }
}
