<?php

namespace App\Controller\Authenticated;

use App\Entity\Profile;
use App\Form\AdminType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[isGranted("ROLE_USER")]
class SecurityController extends AbstractController
{
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    #[isGranted("ROLE_SUPER_ADMIN")]
    #[Route(path: '/admin/{id}', name: 'app_give_roles')]
    public function giveRoles(Profile $profile, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $profile->getUser();
        $form = $this->createForm(AdminType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $roleToGive = $form["roles"]->getData();
            $user->setRoles($roleToGive);
            $entityManager->flush();
            return $this->redirectToRoute('app_user_show', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);

        }
        return $this->render('admin/give_role.html.twig', [
            'form' => $form,
            'user' => $user
        ]);
    }

}
