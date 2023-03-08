<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use App\Form\GalleryFormType;
use App\Repository\ImagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('admin/gallery', name: 'admin_gallery_')]
class GalleryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ImagesRepository $imagesRepository): Response
    {
        $images = $imagesRepository->findAll();

        return $this->render('admin/gallery/index.html.twig', compact('images'));
    }


    #[Route('/ajout', name: 'add')]
    public function add(Request $request ,EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $image = new Images();
        $form = $this->createForm(GalleryFormType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 

            $imageFile = $form->get('image_filename')->getData();
            
            if ($imageFile) {
            $originalFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFileName);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $image->setImageFilename($newFilename);
            }
            
            $entityManager->persist($image);
            $entityManager->flush();
 
            $this->addFlash('success', 'Votre photo à bien été ajouté');

             return $this->redirectToRoute('admin_gallery_index');
        }

        return $this->render('admin/gallery/addimage.html.twig', [
            'GalleryForm' => $form->createView()
        ]);
    }


    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger ,Images $image): Response
    {

        $form = $this->createForm(GalleryFormType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 

            $imageFile = $form->get('image')->getData();
            
            if ($imageFile) {
            $originalFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFileName);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $image->setImageFilename($newFilename);
            }
            
            $entityManager->persist($image);
            $entityManager->flush();
 
            $this->addFlash('success', 'La modification de l\'image a bien été prise en compte');

             return $this->redirectToRoute('admin_gallery_index');
        }
        return $this->render('admin/gallery/EditImage.html.twig', [
            'GalleryForm' => $form->createView()
        ]);
    }



    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Images $image): Response
    {
        $manager = $this->getDoctrine()->getManager();
            $manager->remove($image);
            $manager->flush();

            $this->addFlash('danger', 'La suppression de l\'image a bien été prise en compte');

            return $this->redirectToRoute('admin_gallery_index');
    }
}
