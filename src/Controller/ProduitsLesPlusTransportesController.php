<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsLesPlusTransportesController extends AbstractController
{
    #[Route('/produits/les/plus/transportes', name: 'produits_les_plus_transportes')]
    public function index(): Response
    {
        return $this->render('customer/produits_les_plus_transportes/produit.html.twig', [
            'controller_name' => 'Colis transportés',
        ]);
    }
}
