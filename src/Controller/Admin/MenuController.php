<?php

namespace App\Controller\Admin;

use App\Entity\Menus;
use App\Form\MenuFormType;
use App\Repository\MenusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/menu', name: 'admin_menus_')]
class MenuController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(MenusRepository $menusRepository): Response
    {
        $menus = $menusRepository->findAll();

        return $this->render('admin/menu/index.html.twig', compact('menus'));
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request ,EntityManagerInterface $entityManager): Response
    {
        $menu = new Menus();
        $form = $this->createForm(MenuFormType::class, $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager->persist($menu);
            $entityManager->flush();
 
            $this->addFlash('success', 'Votre menu à bien été ajouté');

             return $this->redirectToRoute('admin_menus_index');
        }

        return $this->render('admin/menu/addMenu.html.twig', [
            'MenuForm' => $form->createView()
        ]);
    }
}
