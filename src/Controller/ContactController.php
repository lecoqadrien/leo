<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

#[Route('/{_locale}')]
class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ManagerRegistry $doctrine,Request $request, ContactRepository $contactrepository): Response
    {

        //Récupération de la connexion à la BDD
        $entityManager = $doctrine->getManager();
        //Création d'un objet vide pour le formulaire
        $contact = new Contact;
       
        //Création du formulaire ContactType
        $form = $this->createForm(ContactType::class, $contact);

        //Demande au formulaire d'analyser la requete HTTP
        $form->handleRequest($request);

        //Si le formulaire a été soumis et qu'il est valide
        if($form->isSubmitted() && $form->isValid()){

            //Prépare la requête 
            $entityManager->persist($contact);

            //Execute la requete 
            $entityManager->flush();
           
            $this->addFlash('success', 'Contact ajouté');
            
        }

        //Récupération de toute la table 'contact'
        $contact = $entityManager->getRepository(Contact::class)->findAll();


        return $this->render('contact/index.html.twig', [
            'contact' => $contact,
            'ajoutContact' => $form->createView()
        ]);
    }
}
