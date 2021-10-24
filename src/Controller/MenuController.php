<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $menuCategory = $categoryRepository->findBy(['title' => 'menu']);

        //On fait appel à la liste de tous les produits
        $menus = $productRepository->findBy(['category' => $menuCategory]);

        return $this->render('menu/menu.html.twig', [
            'menus' => $menus,
        ]);
    }
}








