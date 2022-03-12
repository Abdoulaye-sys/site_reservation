<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Colis;
use App\Entity\Expediteur;
use App\Entity\Receveur;
use App\Entity\Reservation;
use App\Form\InformationReservationColisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;





class ReservationController extends AbstractController
{
    #[Route('reservation', name:'customer_reservation')]

    public function reservation(Request $request,EntityManagerInterface $em){
        $form = $this->createForm(InformationReservationColisType::class);
        $form->handleRequest($request);
        $data = $form-> getData();


        if ($form->isSubmitted() && $form->isValid()) {
            $colis = new Colis();
            $colis->setType($data['type_colis']);
            $colis->setPoids($data['poids_colis']);
            $colis->setPrix($data['poids_colis']*10);

            $em->persist($colis);

            $reservation = new Reservation();
            $reservation->setColis($colis);
            $reservation->setVilleDepart($data['ville_depart']);
            $reservation->setVilleArrivee($data['ville_arrivee']);
            $reservation->setStartedDate($data['date']);
            if ($data['ville_depart']==$data['ville_arrivee']) {
                return  'Choisir deux villes differentes';
            }
            
            $em->persist($reservation);


            $expediteur= new Expediteur();
            $expediteur->setUser($this->getUser());
            $expediteur->setReservation($reservation);

            $em->persist($expediteur);


            $receveur= new Receveur();
            $receveur->setNom($data['nom_receveur']);
            $receveur->setPrenom($data['prenom_receveur']);
            $receveur->setCode($data['code_receveur']);
            $receveur->setTelephone($data['telephone_receveur']);
            $receveur->setReservation($reservation);

            $em->persist($receveur);


            $em->flush();
            return $this->redirectToRoute('customer_recap',['id'=>$reservation->getId()]);
            

        }
        
        


        return $this->render('customer/reservation/reservation.html.twig', [
            'form' => $form->createView(),
        ]);




    }
}

