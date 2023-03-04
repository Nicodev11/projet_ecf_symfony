<?php

namespace App\Controller\Admin;

use App\Entity\Plates;
use App\Form\PlatesFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function add(Request $request ,EntityManagerInterface $entityManager): Response
    {
        $plate = new Plates();
        $form = $this->createForm(PlatesFormType::class, $plate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager->persist($plate);
            $entityManager->flush();
 
            $this->addFlash('success', 'Votre plat à bien été ajouté');

             return $this->redirectToRoute('admin_plates_index');
        }

        return $this->render('admin/plates/addPlates.html.twig', [
            'PlatesForm' => $form->createView()
        ]);
    }


    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, Plates $plate): Response
    {

        $form = $this->createForm(PlatesFormType::class, $plate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager->persist($plate);
            $entityManager->flush();
 
            $this->addFlash('success', 'La modification du plat a bien été prise en compte');

             return $this->redirectToRoute('admin_plates_index');
        }
        return $this->render('admin/plates/EditPlates.html.twig', [
            'PlatesForm' => $form->createView()
        ]);
    }



    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Plates $plates): Response
    {
        return $this->render('admin/plates/index.html.twig');
    }
}
