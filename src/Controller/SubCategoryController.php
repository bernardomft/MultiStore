<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\SubCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubCategoryController extends AbstractController
{
    /**
     * @Route("/sub/category", name="sub_category")
     */
    public function index(): Response
    {
        return $this->render('sub_category/index.html.twig', [
            'controller_name' => 'SubCategoryController',
        ]);
    }

    /**
     * @Route("/subCategory/get", name="app_get_subcategories", methods={"POST","GET"}, options={"expose"=true})
     */
    public function getSubcategories(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content=json_decode($request->getContent());
            $array_subcat = [];
            $entityManager = $this->getDoctrine()->getManager();
            $category = $entityManager->getRepository(Category::class)->findOneBy(['name' => $content]);
            $subcategories = $category->getSubcategories();
            foreach($subcategories as $s){
                array_push($array_subcat, $s->getName());
            }
            return new Response(json_encode($array_subcat));
        }
    }

    /**
     * @Route("/subCategory/features", name="app_get_features", methods={"POST","GET"}, options={"expose"=true})
     */
    public function getFeatures(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content=json_decode($request->getContent());
            $entityManager = $this->getDoctrine()->getManager();
            $subcategory = $entityManager->getRepository(SubCategory::class)->findOneBy(['name' => $content]);
            return new Response(json_encode($subcategory->getCaracteristics()));
        }
    }
}
