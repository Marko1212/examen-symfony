<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Competence;
use App\Entity\Stagiaire;
use App\Form\StagiaireFormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\CompetenceFormType;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="main")
     */
    public function addCompetence(Request $reqest): Response
    {
        $competence =new Competence();
        $form = $this->createForm(CompetenceFormType::class, $competence);
        $form->handleRequest($reqest);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competence);
            $entityManager->flush();
        }

        return $this->render('main/add-competence.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/add-stagiaire", name="add-stagiaire")
     */
    public function addStagiaire(Request $reqest): Response
    {
        $competence =new Stagiaire();
        $form = $this->createForm(StagiaireFormType::class, $competence);
        $form->handleRequest($reqest);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competence);
            $entityManager->flush();
        }

        return $this->render('main/add-competence.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
