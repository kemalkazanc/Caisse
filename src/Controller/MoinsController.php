<?php

namespace App\Controller;

use App\Repository\MoinsRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProductRepository;

class MoinsController extends AbstractController
{
    /**
     * @Route("/moins", name="moins")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $moinsCategory = $categoryRepository->findBy(['title' => 'moins']);

        //On fait appel à la liste de tous les produits
        $moinss = $productRepository->findBy(['category' => $moinsCategory]);

        return $this->render('moins/moins.html.twig', [
            'moinss' => $moinss,
        ]);
    }
}









