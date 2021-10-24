<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\Categories;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/admin/categories", name="admin_product_")
 * @package App\Controller\Admin
 */

class CategoriesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index( ProductRepository $productRepository): Response
    {
        
        $products = $productRepository->findAll();
        return $this->render('admin/categories/index.html.twig', [
            'products' => $products
        ]);
    }

     /**
     * @Route("/ajout", name="ajout")
     */
    public function ajoutCategorie(Request $request)
    {
        $product = new Product;

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('caisse');
        }

        return $this->render('admin/categories/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function ModifCategorie(Categories $categorie, Request $request)
    {
        $form = $this->createForm(CategoriesType::class, $categorie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('admin_categories_home');
        }

        return $this->render('admin/categories/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

}