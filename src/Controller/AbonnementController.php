<?php

namespace App\Controller;

use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{

    #[Route('/abonnement', name: 'app_abonnement')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();

        $abonnement = new Products();
        
        $produits = $em->getRepository(Products::class)->findAll();

        return $this->render('abonnement/index.html.twig', [
            'produits' => $produits,
        ]);
    }

}

