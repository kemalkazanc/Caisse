<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlatsController extends AbstractController
{
    /**
     * @Route("/plat", name="plat")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $platCategory = $categoryRepository->findBy(['title' => 'plat']);

        //On fait appel à la liste de tous les produits
        $plats = $productRepository->findBy(['category' => $platCategory]);

        return $this->render('plat/plat.html.twig', [
            'plats' => $plats,
        ]);
    }
}









