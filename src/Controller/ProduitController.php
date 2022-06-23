<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProduitType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();

        $produit = new Product();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($produit);
            $em->flush();

            $this->addFlash('success', 'Produits ajoutée');
        }

        $produits = $em->getRepository(Produit::class)->findAll();

        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
            'ajout' =>$form->createView()
        ]);
    }

    #[Route('/produit/{id}', name:'produit_edit')]
    public function edit(Produit $produit = null, Request $request, ManagerRegistry $doctrine){
        if($produit == null){
            $this->addFlash('danger', 'Produit introuvable');

            return $this->redirectToRoute('home');
        }

        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($produit);
            $em->flush();

            $this->addFlash('success', 'Produit mise à jour');
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'edit' => $form->createView()
        ]);
    }

    #[Route('/produit/delete{id}', name:'produit_delete')]
    public function delete(Produit $produit = null, ManagerRegistry $doctrine){
        if($produit == null){
            $this->addFlash('danger', 'Produit Introuvable');

            return $this->redirectToRoute('home');
        }

        $em = $doctrine->getManager();

        $em->remove($produit);
        $em->flush();

        $this->addFlash('warning', 'Produit Supprimé');

      
    }
    



    
}
