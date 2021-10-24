<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CaisseController extends AbstractController
{
   
     /**
     * @Route("/index", name="controller")
     */
    public function index(): Response
    {
        return $this->render('caisse/index.html.twig', [
            'controller_name' => 'CaisseController',
        ]);
    }

    /**
    * @Route("/run", name="run")
    */
    public function run(): Response
    {
        return $this->render('caisse/run.html.twig', [
            'controller_name' => 'CaisseController',
        ]);
    }

    /**
    * @Route("/caisse", name="caisse")
    */
    public function caisse(): Response
    {
        return $this->render('caisse/caisse.html.twig', [
               'controller_name' => 'CaisseController',
           ]);
    }

    //LISTE DES BUTTONS DE NOTRE CAISSE

    /**
    * @Route("/calculatrice", name="calculatrice")
    */
    public function calculatrice(): Response
    {
        return $this->render('caisse/calculatrice.html.twig', [
          'controller_name' => 'CaisseController',
        ]);
    }
}    