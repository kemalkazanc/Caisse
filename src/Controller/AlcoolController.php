<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlcoolController extends AbstractController
{
    /**
     * @Route("/alcool", name="alcool")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    { 
        
        $alcoolCategory = $categoryRepository->findBy(['title' => 'alcool']);
        
        //On fait appel à la liste de tous les produits 
        $alcools = $productRepository->findBy(['category' => $alcoolCategory]);

        //dd($alcools);
        return $this->render('alcool/alcool.html.twig', [
            'alcools' => $alcools,
        ]);
    }
}
