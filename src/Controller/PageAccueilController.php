<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageAccueilController extends AbstractController
{
    #[Route('/page/accueil', name: 'page_accueil')]
    public function index(): Response
    {


        return $this->render('customer/page_accueil/accueil.html.twig', [
            'controller_name' => 'PageAccueilController',
        ]);

    }
}
