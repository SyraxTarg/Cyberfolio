<?php

namespace App\Controller\Authenticated;

use App\Entity\Project;
use App\Entity\Technology;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Packages;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/project')]
#[isGranted('ROLE_USER')]
final class ProjectController extends AbstractController
{

    #[Route('/new', name: 'app_project_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, TechnologyRepository $manager): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $file = $form['screenshot']->getData();
            $technologies = $form['technologies']->getData();
            $project->setUser($currentUser);
            $project->setCreatedAt(new \DateTime());
            if ($file) {
                $fileName = $file->getClientOriginalName();
                $newFileName = uniqid() . '-' . $fileName;
                $file->move('./images/projects', $newFileName);
            } else{
                $newFileName = 'default.jpg';
            }
            foreach ($technologies as $technology) {
                $tech = $manager->find($technology);
                $project->addTechnology($tech);
            }

            $project->setScreenshot($newFileName);
            $entityManager->persist($project);
            $entityManager->flush();


            $this->addFlash(
                'success',
                'le projet a été créé'
            );
            return $this->redirectToRoute('app_project_show', ['id' => $project->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('project/new.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_project_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Project $project, EntityManagerInterface $entityManager, TechnologyRepository $manager): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $technologies = $form['technologies']->getData();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['screenshot']->getData();
            if ($file) {
                $fileName = $file->getClientOriginalName();
                $newFileName = uniqid() . '-' . $fileName;
                $file->move('./images/projects', $newFileName);
            } else{
                $newFileName = $project->getScreenshot();
            }
            foreach ($technologies as $technology) {
                $tech = $manager->find($technology);
                $tech->addProject($project);
            }

            $project->setScreenshot($newFileName);
            $entityManager->flush();

            return $this->redirectToRoute('app_project_show', ['id' => $project->getId()], Response::HTTP_SEE_OTHER);
        }

        $this->addFlash(
            'success',
            'le projet a été édité'
        );

        return $this->render('project/edit.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_project_delete', methods: ['POST'])]
    public function delete(Request $request, Project $project, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->getPayload()->getString('_token'))) {
            if ($project->getScreenshot() != 'default.jpg') {
                $filesystem = new Filesystem();
                $path = './images/'.$project->getScreenshot();
                $filesystem->remove($path);
            }
            $entityManager->remove($project);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'le projet a été supprimé'
            );
        }

        return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
    }
}
