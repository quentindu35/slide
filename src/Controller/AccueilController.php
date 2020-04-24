<?php

namespace App\Controller;

use App\Entity\Photo;
use App\Form\PhotoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Slide;

class AccueilController extends AbstractController
{
    
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(EntityManagerInterface $em, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $upload = new Photo();
        $form = $this->createForm(PhotoType::class, $upload);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $upload->getNom();
            $extention = $file->guessExtension();
            $fileName = md5(uniqid());
            $file->move($this->getParameter('upload_directory'), $fileName.'.'.$extention);
            $upload->setNom($fileName);
            $upload->setExtention(".".$extention);
            $upload->setDatedAjout(new \DateTime());
            $entityManager->persist($upload);
            $entityManager->flush();

        if ($slide)        

            return $this->redirectToRoute('accueil');
        }
        $slides = $em->getRepository(Slide::class)->findAll();
        $images =$this->getDoctrine()
            ->getRepository(Photo::class)
            ->findAll();
        $presentations = $this->getDoctrine()->getRepository(Presentation::class)->findAll();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'slides' => $slides,
            'form' => $form->createView(),
            'images' => $images,
            'presentations' => $presentations
        ]);
    }
}
