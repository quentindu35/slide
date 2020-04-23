<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function index()
    {
        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }

    /**
     * @Route("/connexion/log", name="connexion-log")
     */
    public function log(EntityManagerInterface $em)
    {
        $utilisateur = $em->getRepository(Utilisateur::class)->findUtilisateurConnexion($_POST['user_mail'], $_POST['mdp']);
        $data = [
            'email' => $_POST['user_mail'],
            'mdp' => $_POST['mdp'],
        ];
        echo "<pre>"; var_dump($utilisateur); die();
    }
}
