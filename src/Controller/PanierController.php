<?php

namespace App\Controller;

use App\Service\Panier\PanierService\delete; 
use App\Service\Panier\PanierService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(PanierService $panierService)
    {
        
        return $this->render('panier/index.html.twig', 
        [
            
            'items' => $panierService->getFullPanier(), 
            //'total' => $panierService->getTotal()
        ]);

    }

    //On définit la route et de l'affichage de l'url
    //On ajoute un produit
    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public function add($id, PanierService $panierService) 
    {
        $panierService->add($id);
        
        return $this->redirectToRoute("panier"); 
    }

    //On supprime -1 
     /**
     * @Route("/panier/delete/{id}", name="panier_delete")
    */
    public function delete($id, PanierService $panierService) 
    {
     $panierService->delete($id);
  
     return $this->redirectToRoute("panier"); 
    }



    //Pour supprimer TOUTE la ligne 
    /**
     * @Route("/panier/remove/{id}", name="panier_remove")
     */
    public function remove($id, PanierService $panierService) 
    {
        $panierService->remove($id); 

        return $this->redirectToRoute('panier'); 
    }
}
