<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Repository\ProfileRepository;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/profile')]
final class ProfileController extends AbstractController
{

    #[Route(name: 'app_profile_index', methods: ['GET'])]
    public function index(ProfileRepository $profileRepository): Response
    {
        return $this->render('profile/index.html.twig', [
            'profiles' => $profileRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_profile_show', methods: ['GET'])]
    public function show(Profile $profile): Response
    {
        $currentUser = $this->getUser();
        $canEdit = true;
        if ($profile->getUser() !== $currentUser || $this->isGranted('ROLE_SUPER_ADMIN')) {
            $canEdit = false;
        }
        return $this->render('profile/show.html.twig', [
            'profile' => $profile,
            'canEdit' => $canEdit,
        ]);
    }

}
