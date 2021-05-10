<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebcamController extends AbstractController
{
    /**
     * @Route("/listSubCategories/Webcam", name="app_listSubCategoriesWebcam")
     */
    public function listSubCategoriesWebcam (SubCategoryRepository $SubCategoryRepository): Response{
        $SubCategory = $SubCategoryRepository->findOneBy(['name' => 'Webcam']);
        $productWebcam = [];
        $webcams = null;
       
        $webcams = $SubCategory->getWebcams();
        foreach ($webcams as $d) {
            array_push($productWebcam, $d->getIdProduct());
        }

        return $this->render('subcategory/webcam.html.twig', [
            'productWebcam' => $productWebcam,
            'webcams' => $webcams
        ]);
    }
}
