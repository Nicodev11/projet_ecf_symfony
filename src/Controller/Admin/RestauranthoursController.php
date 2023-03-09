<?php

namespace App\Controller\Admin;

use App\Entity\RestaurantHours;
use App\Form\RestaurantHoursFormType;
use App\Repository\RestaurantHoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/horaires', name: 'admin_restaurant_')]
class RestauranthoursController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(RestaurantHoursRepository $restaurantHoursRepository): Response
    {
        $hours = $restaurantHoursRepository->findAll();

        return $this->render('admin/restauranthours/index.html.twig', compact('hours'));
    }

    #[Route('/edition/{Day}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, RestaurantHours $hours): Response
    {
        $form = $this->createForm(RestaurantHoursFormType::class, $hours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager->persist($hours);
            $entityManager->flush();
 
            $this->addFlash('success', 'La modification du plat a bien été prise en compte');

             return $this->redirectToRoute('admin_restaurant_index');
        }

        return $this->render('admin/restauranthours/editHours.html.twig', [
            'HoursForm' => $form->createView()
        ]);
    }
}
