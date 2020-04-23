<?php

namespace App\Controller;

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
    public function log()
    {
        $data = [
            'email' => $_POST['user_mail'],
            'mdp' => $_POST['mdp'],
        ];
    }
}
