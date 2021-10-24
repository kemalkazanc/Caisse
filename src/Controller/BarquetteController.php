<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BarquetteController extends AbstractController
{
    /**
     * @Route("/barquette", name="barquette")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $barquetteCategory = $categoryRepository->findBy(['title' => 'barquette']);

        //On fait appel à la liste de tous les produits
        $barquettes = $productRepository->findBy(['category' => $barquetteCategory]);

        return $this->render('barquette/barquette.html.twig', [
            'barquettes' => $barquettes,
        ]);
    }
}
