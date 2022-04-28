<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StronaGlownaController extends AbstractController
{
    #[Route('/glowna', name: 'glowna')]
    public function index(): Response
    {
        return $this->render('strona_glowna/index.html.twig', [
            'controller_name' => 'StronaGlownaController',
        ]);
    }
}
