<?php

namespace App\Controller;

use App\Entity\Laptop;
use App\Form\LaptopType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/laptop")
 */
class LaptopController extends AbstractController
{
    /**
     * @Route("/", name="laptop_index", methods={"GET"})
     */
    public function index(): Response
    {
        $laptops = $this->getDoctrine()
            ->getRepository(Laptop::class)
            ->findAll();

        return $this->render('laptop/index.html.twig', [
            'laptops' => $laptops,
        ]);
    }

    /**
     * @Route("/new", name="laptop_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $laptop = new Laptop();
        $form = $this->createForm(LaptopType::class, $laptop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($laptop);
            $entityManager->flush();

            return $this->redirectToRoute('laptop_index');
        }

        return $this->render('laptop/new.html.twig', [
            'laptop' => $laptop,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="laptop_show", methods={"GET"})
     */
    public function show(Laptop $laptop): Response
    {
        return $this->render('laptop/show.html.twig', [
            'laptop' => $laptop,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="laptop_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Laptop $laptop): Response
    {
        $form = $this->createForm(LaptopType::class, $laptop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('laptop_index');
        }

        return $this->render('laptop/edit.html.twig', [
            'laptop' => $laptop,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="laptop_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Laptop $laptop): Response
    {
        if ($this->isCsrfTokenValid('delete'.$laptop->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($laptop);
            $entityManager->flush();
        }

        return $this->redirectToRoute('laptop_index');
    }
}
