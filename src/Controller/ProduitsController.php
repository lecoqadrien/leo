<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();

        $produit = new Produits();
        $form = $this->createForm(ProduitsType::class, $produit);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($produits);
            $em->flush();

            $this->addFlash('success', 'Produits ajoutée');
        }

        $produits = $em->getRepository(Produits::class)->findAll();

        return $this->render('produits/index.html.twig', [
            'controller_name' => 'ProduitsController',
            'ajout' =>$form->createView()
        ]);
    }
}
