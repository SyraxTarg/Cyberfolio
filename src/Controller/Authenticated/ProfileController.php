<?php

namespace App\Controller\Authenticated;

use App\Entity\CentresInteret;
use App\Entity\Competence;
use App\Entity\Formation;
use App\Entity\Profile;
use App\Form\ProfileType;
use App\Repository\CentresInteretsRepository;
use App\Repository\ProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/profile')]
#[isGranted('ROLE_USER')]
final class ProfileController extends AbstractController
{

    #[Route('/{id}', name: 'app_profile_delete', methods: ['POST'])]
    public function delete(Request $request, Profile $profile, EntityManagerInterface $entityManager): Response
    {
        $currentUser = $this->getUser();
        if(!$this->isGranted('ROLE_ADMIN') || !$this->isGranted('ROLE_SUPER_ADMIN')){
            if ($profile->getUser() !== $currentUser ) {
                throw $this->createAccessDeniedException('You can only remove your own profile.');
            }
        }

        if ($this->isCsrfTokenValid('delete'.$profile->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($profile);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_profile_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/{id}/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Profile $profile, EntityManagerInterface $entityManager): Response
    {
        $currentUser = $this->getUser();

        if ($profile->getUser() !== $currentUser && !$this->isGranted('ROLE_SUPER_ADMIN') && !$this->isGranted('ROLE_ADMIN')) {
            if(!$this->isGranted('ROLE_SUPER_ADMIN') && !$this->isGranted('ROLE_ADMIN')){
                throw $this->createAccessDeniedException('You can only edit your own profile.');
            } else{
                $currentUser = $profile->getUser();
            }

        }else{
            $currentUser = $profile->getUser();
        }

        $form = $this->createForm(ProfileType::class, $profile, [
            'user' => $currentUser,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $firstName = $form->get('prenom')->getData();
            $currentUser->setFirstName($firstName);
            $lastName = $form->get('nom')->getData();
            $currentUser->setLastname($lastName);
            $tel = $form->get('telephone')->getData();
            $profile->setTelephone($tel);
            $file = $form['profilePicture']->getData();
            if ($file) {
                $fileName = $file->getClientOriginalName();
                $newFileName = uniqid() . '-' . $fileName;
                $file->move('./images/pfps', $newFileName);
            } else{
                $newFileName = $profile->getProfilePicture();
            }
            $profile->setProfilePicture($newFileName);
            foreach ($form["competences"]->getData() as $competence) {
                if($competence->isEmpty()){
                    $profile->removeCompetence($competence);
                    $entityManager->remove($competence);
                } else{
                    $entityManager->persist($competence);
                    $profile->addCompetence($competence);
                }

            }
            foreach ($form["formations"]->getData() as $formation) {
                if($formation->isEmpty()){
                    $profile->removeFormation($formation);
                    $entityManager->remove($formation);
                } else{
                    $entityManager->persist($formation);
                    $profile->addFormation($formation);
                }
            }
            foreach ($form["experiences"]->getData() as $experience) {
                if($experience->isEmpty()){
                    $profile->removeExperience($experience);
                    $entityManager->remove($experience);
                } else{
                    $entityManager->persist($experience);
                    $profile->addExperience($experience);
                }
            }
            foreach ($form["centresInterets"]->getData() as $cI) {
                if($cI->isEmpty()){
                    $profile->removeCentresInteret($cI);
                    $entityManager->remove($cI);
                } else{
                    $entityManager->persist($cI);
                    $profile->addCentresInteret($cI);
                }
            }

            $entityManager->flush();
            $this->addFlash(
                'success',
                'le profil a bien été édité'
            );

            return $this->redirectToRoute('app_profile_show', ['id' => $profile->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profile/edit.html.twig', [
            'profile' => $profile,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/myProfile', name: 'app_profile_show_my_profile', methods: ['GET'])]
    public function showMyProfile(): Response
    {
        $currentUser = $this->getUser();
        $profile = $currentUser->getProfile();
        return $this->render('profile/show.html.twig', [
            'profile' => $profile,
            'canEdit' => true,
        ]);
    }

    #[Route('/delete/myProfile', name: 'app_profile_delete_my_profile', methods: ['POST'])]
    public function deleteMyProfile(Request $request, EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage, SessionInterface $session): Response
    {
        $profile = $this->getUser()->getProfile();

        if ($this->isCsrfTokenValid('delete' . $profile->getId(), $request->request->get('_token'))) {
            $entityManager->remove($profile);
            $entityManager->flush();

            $tokenStorage->setToken(null);
            $session->invalidate();
        }

        return $this->redirectToRoute('app_project_index');
    }


}
