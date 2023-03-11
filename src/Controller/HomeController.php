<?php

namespace App\Controller;

use App\Repository\RestaurantHoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'home_')]
class HomeController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route(name: 'footer')]
    public function footer(RestaurantHoursRepository $restaurantHoursRepository): Response {
        $hours = $restaurantHoursRepository->findAll();

        return $this->render('_partials/_footer.html.twig', compact('hours'));
    }
}
