<?php

namespace App\Controller\Authenticated;

use App\Controller\isGranted;
use App\Entity\CentresInteret;
use App\Entity\Profile;
use App\Form\CentresInteretsType;
use App\Repository\CentresInteretsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/interet')]
#[isGranted("ROLE_USER")]
final class CentresInteretController extends AbstractController
{
    #[Route(name: 'app_centres_interets_index', methods: ['GET'])]
    public function index(CentresInteretsRepository $centresInteretsRepository): Response
    {
        return $this->render('centres_interets/index.html.twig', [
            'centres_interets' => $centresInteretsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_centres_interets_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $centresInteret = new CentresInteret();
        $form = $this->createForm(CentresInteretsType::class, $centresInteret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($centresInteret);
            $entityManager->flush();

            return $this->redirectToRoute('app_centres_interets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('centres_interets/new.html.twig', [
            'centres_interet' => $centresInteret,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centres_interets_show', methods: ['GET'])]
    public function show(CentresInteret $centresInteret): Response
    {
        return $this->render('centres_interets/show.html.twig', [
            'centres_interet' => $centresInteret,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_centres_interets_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CentresInteret $centresInteret, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CentresInteretsType::class, $centresInteret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_centres_interets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('centres_interets/edit.html.twig', [
            'centres_interet' => $centresInteret,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centres_interets_delete', methods: ['POST'])]
    public function delete(Request $request, CentresInteret $centresInteret, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centresInteret->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($centresInteret);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_centres_interets_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{ciId}/{profileId}', name: 'app_centres_interets_delete_from_profile', methods: ['POST'])]
    public function deleteFromProfile(Request $request, int $ciId, int $profileId, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $logger->info("Suppression demandée pour ciId: $ciId et profileId: $profileId");

        if ($this->isCsrfTokenValid('deleteFromProfile' . $ciId, $request->request->get('_token'))) {
            // Logique de suppression
            $profile = $entityManager->getRepository(Profile::class)->find($profileId);
            $centreInteret = $entityManager->getRepository(CentresInteret::class)->find($ciId);

            if ($profile && $centreInteret) {
                $profile->removeCentresInteret($centreInteret);
                $entityManager->flush();
                $logger->info("Suppression réussie");
            } else {
                $logger->warning("Profil ou centre d'intérêt non trouvé");
            }
        } else {
            $logger->warning("Token CSRF invalide");
        }

        return $this->redirectToRoute('app_profile_edit', ['id' => $profileId], Response::HTTP_SEE_OTHER);
    }


}
