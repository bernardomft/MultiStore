<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KeyboardController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Teclado", name="app_listSubCategoriesTeclado")
     */
    public function listSubCategoriesTeclado (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Teclado']);
        $productKeyboards = [];
        $keyboards = null;
       
        $keyboards = $SubCategory->getKeyboards();
        foreach ($keyboards as $d) {
            array_push($productKeyboards, $d->getIdProduct());
        }

        return $this->render('subcategory/teclado.html.twig', [
            'productsKeyboards' => $productKeyboards,
            'keyboards' => $keyboards
        ]);
    }
}
