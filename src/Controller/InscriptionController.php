<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index()
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    /**
     * @Route("/inscription/insert", name="inscription")
     */
    public function insert()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $utilisateur = new Utilisateur();
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setEmail($_POST['user_mail']);
        $utilisateur->setMdp($_POST['mdp']);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($utilisateur);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
}
