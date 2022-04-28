<?php

namespace App\Controller\Admin;

use App\Entity\Kategoria;
use App\Entity\Wydawnictwo;
use App\Entity\Egzemplarz;
use App\Entity\Gra;
use App\Entity\Komentarz;
use App\Entity\Rezerwacja;
use App\Entity\Uzytkownik;
use App\Entity\Wypozyczenie;

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
       // return parent::index();

        return $this->render('admin/index.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Wypożyczalnia Gier Planszowych');
    }

    public function configureMenuItems(): iterable
    {
       // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

       //MenuItem::section('Kategoria');
        //yield MenuItem::linkToCrud('Kategoria', 'fas fa-list', Kategoria::class);

      //  MenuItem::section('xxxx');
      //  yield MenuItem::linkToCrud('Wydawnictwo', 'fas fa-folder', Wydawnictwo::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

      return  [//MenuItem::section('Kategoria'), MenuItem::linkToCrud('Kategoria', 'fas fa-list', Kategoria::class),
         // MenuItem::subMenu('Dane', 'fa fa-article')->setSubItems([
            MenuItem::section('Słowniki'),
            MenuItem::linkToCrud('Kategoria', 'fas fa-list', Kategoria::class),
            MenuItem::linkToCrud('Wydawnictwo', 'fas fa-folder', Wydawnictwo::class),

            MenuItem::section('Katalog'),
            MenuItem::linkToCrud('Użytkownicy', 'fas fa-chalkboard-teacher', Uzytkownik::class),
            MenuItem::linkToCrud('Gry', 'fas fa-dice', Gra::class),
            MenuItem::linkToCrud('Egzemplarze', 'fas fa-folder', Egzemplarz::class),


            MenuItem::linkToCrud('Rezerwacje', 'fas fa-hourglass-half', Rezerwacja::class),
            MenuItem::linkToCrud('Wypozyczenia', 'fas fa-hand-paper', Wypozyczenie::class),
            MenuItem::linkToCrud('Komentarze', 'fas fa-sticky-note', Komentarz::class),

            MenuItem::linktoRoute('Gry - kalendarz wypożyczeń', 'fa fa-chart-bar', 'app_kalendarz_gry')

      //  ])
    
    ];
    }
}
