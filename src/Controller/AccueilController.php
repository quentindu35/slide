<?php

namespace App\Controller;

use App\Entity\Photo;
use App\Entity\Presentation;
use App\Form\PhotoType;
use App\Form\PresentationType;
use App\Form\SlideType;
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
        $presentations = $this->getDoctrine()->getRepository(Presentation::class)->findAll();

        $entityManager = $this->getDoctrine()->getManager();
        $upload = new Photo();
        $slide = new Slide();
        $presentation = new Presentation();
        $formSlide = $this->createForm(SlideType::class, $slide);
        $formPresentation = $this->createForm(PresentationType::class, $presentation);
        $form = $this->createForm(PhotoType::class, $upload);
        $form->handleRequest($request);
        $formSlide->handleRequest($request);
        $formPresentation->handleRequest($request);
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

            return $this->redirectToRoute('accueil');
        }
        if ($formSlide->isSubmitted() && $formSlide->isValid()) {
            $slide->setPresentation(count($presentations));
            $entityManager->persist($slide);
            $entityManager->flush();

            return $this->redirectToRoute('accueil');
        }

        if ($formPresentation->isSubmitted() && $formPresentation->isValid()) {
            $presentation->setDatedeCreation(new \DateTime());
            $presentation->setDatedeModification(new \DateTime());
            $entityManager->persist($presentation);
            $entityManager->flush();

            return $this->redirectToRoute('accueil');
        }
        $slides = $em->getRepository(Slide::class)->findAll();
        $images =$this->getDoctrine()
            ->getRepository(Photo::class)
            ->findAll();


        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'slides' => $slides,
            'form' => $form->createView(),
            'formPresentation' => $formPresentation->createView(),
            'formSlide' => $formSlide->createView(),
            'images' => $images,
            'presentations' => $presentations
        ]);
    }
}
