<?php

namespace App\Controller;

use App\Repository\SaladeRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SaladeController extends AbstractController
{
    /**
     * @Route("/salade", name="salade")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $saladeCategory = $categoryRepository->findBy(['title' => 'salade']);

        //On fait appel à la liste de tous les produits
        $salades = $productRepository->findBy(['category' => $saladeCategory]);

        return $this->render('salade/salade.html.twig', [
            'salades' => $salades,
        ]);
    }
}










