<?php

namespace App\Controller;


use App\Repository\ProductRepository; 
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product")
     */
    public function index(ProductRepository $productRepository)
    {
        //On fait appelle à la liste de tous les produits 
       
        $products = $productRepository->findAll();

        //dd($products); 
        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }    
}
