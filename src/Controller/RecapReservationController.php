<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Colis;
use App\Entity\Receveur;
use App\Entity\Expediteur;
use App\Entity\Reservation;
use App\Form\AdressForm;
use App\Form\InformationReservationColisType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class  RecapReservationController extends AbstractController
{
    #[Route('customer/recap/reservation/{id}', name: 'customer_recap')]
    public function recap(Reservation $reservation, Request $request , Colis $colis)
    {     
        $utilisateur = $this->getUser();
        $receveur = $reservation->getReceveur();
        $date = $reservation->getstartedDate();
        $villeDepart = $reservation->getVilleDepart();
        $villeArrive = $reservation->getVilleArrivee();
        return $this->render('customer/recap_reservation.html.twig', [
            'user' => $utilisateur,
            'date' => $date,
            'reservation' => $reservation,
            'destinataire' => $receveur,
            'villeDepart' => $villeDepart,
            'villeArrive' => $villeArrive,
            'colis' => $colis,


        ]);




    }

    }

