<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Slide;

class AccueilController extends AbstractController
{
    


    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(EntityManagerInterface $em)
    {
        $slides = $em->getRepository(Slide::class)->findAll();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'slides' => $slides,
        ]);
    }
}
