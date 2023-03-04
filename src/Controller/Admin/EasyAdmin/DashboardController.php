<?php

namespace App\Controller\Admin\EasyAdmin;

use App\Entity\Plates;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/easyadmin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('/admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="assets/img/logo.png">');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Les plats');

        yield MenuItem::subMenu('Les plats', 'fa-solid fa-plate-wheat')->setSubItems([
            MenuItem::linkToCrud('Voir tous les plats', 'fa-solid fa-eye', Plates::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Ajouter un plat', 'fa-solid fa-circle-plus', Plates::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::section('Contact');

        yield MenuItem::linkToCrud('Comptes clients', 'fas fa-user', Users::class);
    }
}
