<?php

namespace App\Controller;

use App\Repository\DessertRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DessertController extends AbstractController
{
    /**
     * @Route("/dessert", name="dessert")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
{
        $dessertCategory = $categoryRepository->findBy(['title' => 'dessert']);

        //On fait appel à la liste de tous les produits
        $desserts = $productRepository->findBy(['category' => $dessertCategory]);

        return $this->render('dessert/dessert.html.twig', [
            'desserts' => $desserts,
        ]);
    }
}