<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\User;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProjectController extends AbstractController
{

    #[Route('/')]
    #[Route(name: 'app_project_index', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }
    #[Route('/project/user/{id}', name: 'app_project_by_user', methods: ['GET'])]
    public function projectByUser(User $user, ProjectRepository $projectRepository): Response
    {
        $superAdmin = false;
        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            $superAdmin = true;
        }
        $projects = $projectRepository->findBy(['user' => $user]);
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
            'superAdmin' => $superAdmin

        ]);
    }


    #[Route('/project/{id}', name: 'app_project_show', methods: ['GET'])]
    public function show(Project $project): Response
    {
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

}
