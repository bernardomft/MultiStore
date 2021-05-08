<?php

namespace App\Controller;

use App\Entity\Product;

use App\Repository\SubCategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DesktopController extends AbstractController
{
    /**
     * @Route("/listSubCategories/PcSobremesa", name="app_listSubCategoriesPcSobremesa")
     */
    public function listSubCategoriesPcSobremesa (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'PC/Sobremesa']);
        $productsDesktops = [];
        $desktops = null;
       
        $desktops = $SubCategory->getDesktops();
        foreach ($desktops as $d) {
            array_push($productsDesktops, $d->getIdProduct());
        }

        return $this->render('subcategory/pcSobremesa.html.twig', [
            'productsDesktops' => $productsDesktops,
            'desktops' => $desktops
        ]);
    }

}
