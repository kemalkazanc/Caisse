<?php

namespace App\Controller;



use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlusController extends AbstractController
{
    /**
     * @Route("/plus", name="plus")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $plusCategory = $categoryRepository->findBy(['title' => 'plus']);

        //On fait appel à la liste de tous les produits
        $pluss = $productRepository->findBy(['category' => $plusCategory]);

        return $this->render('plus/plus.html.twig', [
            'pluss' => $pluss,
        ]);
    }
}








