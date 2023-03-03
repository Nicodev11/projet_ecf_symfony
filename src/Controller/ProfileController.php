<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/profil",name:"profile_")]
class ProfileController extends AbstractController
{
    #[Route('/user', name:'user')]
    public function user(): Response
    {
        return $this->render('profile/user.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    #[Route('/admin', name:'admin')]
    public function admin(): Response
    {
        return $this->render('profile/admin.html.twig');
    }
}
