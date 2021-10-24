<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\SuppViandeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuppViandeController extends AbstractController
{
    /**
     * @Route("/suppViande", name="suppViande")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $suppViandeCategory = $categoryRepository->findBy(['title' => 'suppViande']);

        //On fait appel à la liste de tous les produits
        $suppViandes = $productRepository->findBy(['category' => $suppViandeCategory]);

        return $this->render('supp_viande/suppViande.html.twig', [
            'suppViandes' => $suppViandes,
        ]);
    }
}








