<?php

namespace App\Controller;

use App\Repository\MenusRepository;
use App\Repository\PlatesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantMenuController extends AbstractController
{
    #[Route('/menu', name: 'app_restaurant_menu')]
    public function index(PlatesRepository $platesRepository, MenusRepository $menusRepository): Response
    {
        $plates = $platesRepository->findAll();
        $menus = $menusRepository->findAll();

        return $this->render('pages/restaurant_menu/index.html.twig', compact('plates', 'menus'));
    }
}
