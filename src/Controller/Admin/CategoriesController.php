<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Form\CategoriesFormType;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/categories', name: 'admin_categories_')]
class CategoriesController extends AbstractController
{
    
    #[Route('/', name: 'index')]
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        $categories = $categoriesRepository->findAll();

        return $this->render('admin/categories/index.html.twig', compact('categories'));
    }


    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Categories();
        $form = $this->createForm(CategoriesFormType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager->persist($category);
            $entityManager->flush();
 
            $this->addFlash('success', 'Votre plat à bien été ajouté');

             return $this->redirectToRoute('admin_categories_index');
        }

        return $this->render('admin/Categories/addCategories.html.twig', [
            'CategoriesForm' => $form->createView()
        ]);

    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, Categories $categories): Response
    {

        $form = $this->createForm(CategoriesFormType::class, $categories);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager->persist($categories);
            $entityManager->flush();
 
            $this->addFlash('success', 'La modification de la catégorie a bien été prise en compte');

             return $this->redirectToRoute('admin_categories_index');
        }
        return $this->render('admin/Categories/EditCategories.html.twig', [
            'CategoriesForm' => $form->createView()
        ]);
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Categories $categories): Response
    {
        $manager = $this->getDoctrine()->getManager();
            $manager->remove($categories);
            $manager->flush();

            $this->addFlash('danger', 'La suppression de la catégorie a bien été prise en compte');

            return $this->redirectToRoute('admin_categories_index');
    }
}
