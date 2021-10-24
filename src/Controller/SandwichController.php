<?php

namespace App\Controller;

use App\Entity\Sandwich;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\SandwichRepository; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SandwichController extends AbstractController
{
    /**
     * @Route("/sandwich", name="sandwich")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $sandwichCategory = $categoryRepository->findBy(['title' => 'sandwich']);

        //On fait appel à la liste de tous les produits
        $sandwichs = $productRepository->findBy(['category' => $sandwichCategory]);

        return $this->render('sandwich/sandwich.html.twig', [
            'sandwichs' => $sandwichs,
        ]);
    }
}








