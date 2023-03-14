<?php

namespace App\Controller\Admin;

use App\Repository\RestaurantHoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(RestaurantHoursRepository $restaurantHoursRepository): Response
    {

        $days = $restaurantHoursRepository->findAll();

        return $this->render('admin/index.html.twig', compact('days'));
    }
}
