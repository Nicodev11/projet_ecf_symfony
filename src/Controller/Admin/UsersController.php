<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Form\UsersFormType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/utilisateurs', name: 'admin_users_')]
class UsersController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, UsersRepository $usersRepository): Response
    {
        $users = $usersRepository->findAll([]);

        return $this->render('admin/users/index.html.twig', compact('users'));
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, Users $user): Response
    {

        $form = $this->createForm(UsersFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager->persist($user);
            $entityManager->flush();
 
            $this->addFlash('success', 'La modification de l\utilisateur a bien été prise en compte');

             return $this->redirectToRoute('admin_users_index');
        }
        return $this->render('admin/users/Editusers.html.twig', [
            'UsersForm' => $form->createView()
        ]);
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Users $user): Response
    {
        $manager = $this->getDoctrine()->getManager();
            $manager->remove($user);
            $manager->flush();

            $this->addFlash('danger', 'La suppression du plat a bien été prise en compte');

            return $this->redirectToRoute('admin_users_index');
    }
}
