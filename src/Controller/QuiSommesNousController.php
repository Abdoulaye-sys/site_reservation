<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuiSommesNousController extends AbstractController
{
    #[Route('/qui/sommes/nous', name: 'qui_sommes_nous')]
    public function index(): Response
    {
        return $this->render('customer/qui_sommes_nous/about_us.html.twig', [
            'controller_name' => 'QuiSommesNousController',
        ]);
    }
}
