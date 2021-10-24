<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\BoissonChaudeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoissonChaudeController extends AbstractController
{
    /**
     * @Route("/boissonChaude", name="boisson_chaude")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
 {
     $boissonChaudeCategory = $categoryRepository->findBy(['title' => 'boissonChaude']);

     //On fait appel à la liste de tous les produits
     $boissonChaudes = $productRepository->findBy(['category' => $boissonChaudeCategory]);
     return $this->render('boisson_Chaude/boissonChaude.html.twig', [
         
         'boissonChaudes' => $boissonChaudes,
     ]);
    }
}
