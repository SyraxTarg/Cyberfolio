<?php

namespace App\Controller\Authenticated;

use App\Entity\Competence;
use App\Entity\Profile;
use App\Form\CompetencesType;
use App\Repository\CompetencesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/competences')]
#[isGranted('ROLE_USER')]
final class CompetenceController extends AbstractController
{
    #[Route(name: 'app_competences_index', methods: ['GET'])]
    public function index(CompetencesRepository $competencesRepository): Response
    {
        return $this->render('competences/index.html.twig', [
            'competences' => $competencesRepository->findAll(),
        ]);
    }

    #[Route('/new/{id}', name: 'app_competences_new', methods: ['GET', 'POST'])]
    public function new(Profile $profile, Request $request, EntityManagerInterface $entityManager): Response
    {
        $competence = new Competence();
        $form = $this->createForm(CompetencesType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profile->addCompetence($competence);
            $entityManager->persist($competence);
            $entityManager->flush();

            return $this->redirectToRoute('app_profile_edit', ['id' => $profile->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('competences/new.html.twig', [
            'competence' => $competence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_competences_show', methods: ['GET'])]
    public function show(Competence $competence): Response
    {
        return $this->render('competences/show.html.twig', [
            'competence' => $competence,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_competences_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Competence $competence, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CompetencesType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_competences_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('competences/edit.html.twig', [
            'competence' => $competence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_competences_delete', methods: ['POST'])]
    public function delete(Request $request, Competence $competence, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$competence->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($competence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_competences_index', [], Response::HTTP_SEE_OTHER);
    }
}
