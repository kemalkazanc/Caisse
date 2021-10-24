<?php

namespace App\Service\Panier;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


//Le service nous permet de récupérer tout se que l'on vient de faire pour le panier 
class PanierService {

    protected $session;
    protected $manager;
    protected $alcoolRepository;
    protected $plusRepository;
    protected $moinsRepository;
    protected $platRepository; 
    protected $menuRepository;
    protected $suppSauceRepository;
    protected $suppViandeRepository;
    protected $entreeRepository;
    protected $sandwichRepository; 

    

    //On ne peut pas ajouter la session dans les function plus bas donc on creer un constructeur et on fait appel à un constructeur

    public function __construct(EntityManagerInterface $manager,
        SessionInterface $session)

    {
        $this->session = $session; 
        $this->manager = $manager;
    }
    

    //Permet d'ajouter un Produit au panier
    //Si le panier est vide j'en rajoute 1 
    //SINON NOempty j'en rajoute 1
    public function add(int $id) { 
        $panier = $this->session->get('panier', []); 
            if(!empty($panier[$id])) {
            $panier[$id]++; 
        } else {
            $panier[$id] = 1;
        }
            $this->session ->set('panier', $panier); 
        }

    //Pour Modifier - 1
    public function delete(int $id) { 
        $panier = $this->session->get('panier', []); 
            if(!empty($panier[$id] > 1)) {
            $panier[$id]--; 
        } else {
            unset($panier[$id]);
        }
            $this->session ->set('panier', $panier); 
        }

    //Permet de SUPPRIMER TOUTE LA LIGNE du panier    
    public function remove(int $id) 
    {
        $panier =$this->session->get('panier', []); 

        if(!empty($panier[$id])) {
        unset($panier[$id]); 
        }

        $this->session->set('panier', $panier); 
    }

    //Permet de recupérer le panier en entier 
    //je fais un tableau en 2 dimensions dans lequel je pourrais avoir on produit et la quantité associé à côté
    public function getFullPanier(): array 
    {
        $panier = $this->session->get('panier', []);
            //dd($panier);
        $panierWithData = []; 
        $productRepository = $this->manager->getRepository(Product::class);

        
        foreach ($panier as $id => $quantity)
        {
            $panierWithData[$id]['product'] = $productRepository->findOneBy(['id'=>$id]);
            $panierWithData[$id]['quantity'] = $quantity;
            
        }
            //dd($panierWithData);
        return $panierWithData;
    }

    //Permet de calculer le prix complet du panier 
    public function getTotal() : float 
    {
        $total = 0; 
        
        foreach ($this->getFullPanier() as $item)
        {
            
            
            $total += $item['product']->getPrice() * $item['quantity']; 
        }
   
        return $total;
    }
}