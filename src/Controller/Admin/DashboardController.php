<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Billet;
use App\Entity\DateEvent;
use App\Entity\Event;
use App\Entity\FamilleAnimal;
use App\Entity\User;
use App\Entity\ZoneParc;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Zoo de Laval');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Home', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fa-solid fa-user', User::class);
        yield MenuItem::linkToCrud('Billet', 'fa-solid fa-ticket', Billet::class);
        yield MenuItem::linkToCrud('Zone Parc', 'fas fa-tree', ZoneParc::class);
        yield MenuItem::linkToCrud('Evenement', 'fas fa-users', Event::class);
        yield MenuItem::linkToCrud('Date Evenement', 'fas fa-calendar-days', DateEvent::class);
        yield MenuItem::linkToCrud('Famille d\'animaux', 'fas fa-hippo', FamilleAnimal::class);
        yield MenuItem::linkToCrud('Animaux', 'fas fa-fish', Animal::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
