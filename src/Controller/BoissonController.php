<?php

namespace App\Controller;

use App\Repository\BoissonRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoissonController extends AbstractController
{
    /**
     * @Route("/boisson", name="boisson")
     */
    
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $boissonCategory = $categoryRepository->findBy(['title' => 'boisson']);
        //On fait appel à la liste de tous les produits
        $boissons = $productRepository->findBy(['category' => $boissonCategory]);
        return $this->render('boisson/boisson.html.twig', [
            'boissons' => $boissons,
        ]);
    }
}
