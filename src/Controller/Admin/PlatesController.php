<?php

namespace App\Controller\Admin;

use App\Entity\Plates;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/plats', name: 'admin_plates_')]
class PlatesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/plates/index.html.twig');
    }
    #[Route('/ajout', name: 'add')]
    public function add(): Response
    {
        return $this->render('admin/plates/index.html.twig');
    }
    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Plates $plates): Response
    {
        return $this->render('admin/plates/index.html.twig');
    }
    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Plates $plates): Response
    {
        return $this->render('admin/plates/index.html.twig');
    }
}
