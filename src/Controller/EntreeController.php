<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntreeController extends AbstractController
{
    /**
     * @Route("/entree", name="entree")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $entreeCategory = $categoryRepository->findBy(['title' => 'entree']);

        //On fait appel à la liste de tous les produits
        $entrees = $productRepository->findBy(['category' => $entreeCategory]);

        return $this->render('entree/entree.html.twig', [
            'entrees' => $entrees,
        ]);
    }
}








