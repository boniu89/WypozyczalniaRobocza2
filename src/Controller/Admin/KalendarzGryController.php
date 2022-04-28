<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class KalendarzGryController extends AbstractController
{
    #[Route('/kalendarz_gry', name: 'app_kalendarz_gry')]
    public function index(): Response
    {
        return $this->render('admin/kalendarz_gry/index.html.twig', [
            'controller_name' => 'KalendarzGryController',
        ]);
    }
}
