<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\SuppSauceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuppSauceController extends AbstractController
{
    /**
     * @Route("/suppSauce", name="suppSauce")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $suppSauceCategory = $categoryRepository->findBy(['title' => 'suppSauce']);

        //On fait appel à la liste de tous les produits
        $suppSauces = $productRepository->findBy(['category' => $suppSauceCategory]);

        return $this->render('supp_Sauce/suppSauce.html.twig', [
            'suppSauces' => $suppSauces,
        ]);
    }
}
