<?php

namespace App\Controller;

use App\Entity\Product;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DesktopController extends AbstractController
{
    /**
     * @Route("/desktop/getProduct/{id}", name="app_getProduct")
     */
    public function getProduct(int $id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(['id' => $id]);
        $desktop = $product->getDesktops();
        return $this->render('desktop/desktop.html.twig', [
            'product' => $product,
            'desktop' => $desktop[0]
        ]);
    }
}
