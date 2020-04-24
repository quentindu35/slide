<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Slide;
use App\Entity\Photo;

class AccueilController extends AbstractController
{
    
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(EntityManagerInterface $em)
    {
        $slides = $em->getRepository(Slide::class)->findAll();
        $photos = $em->getRepository(Photo::class)->findAll();


        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'slides' => $slides,
        ]);
    }
}
