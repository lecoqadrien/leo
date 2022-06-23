<?php

namespace App\Controller;

namespace App\Controller;
use App\Entity\Products;
use App\Form\ProductType;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Session\SessionInterface;



class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session,
    ProductsRepository $productsRepository ,ManagerRegistry $doctrine, Request $request): Response
    {
     
        
        $em = $doctrine->getManager();


        $produit = new Products();
        $form = $this->createForm(ProductType::class, $produit);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($produit);
            $em->flush();

            $this->addFlash('success', 'Produits ajoutée');
        }

        $produits = $em->getRepository(Products::class)->findAll();

        return $this->render('panier/index.html.twig', [
            'products' => $produits,
            
        ]);
    }

    #[Route('/add/{id}', name: 'add_panier')]

    public function add(Products $product, SessionInterface $session)
    {

        //On récupére le panier actuel
        $panier = $session->get("panier", []);
        $id = $product->getId();

        if(!empty($panier[$id])){
            $panier[$id]++;
        }

        //On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("app_panier");
    }
}
