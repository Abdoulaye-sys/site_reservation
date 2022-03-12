<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Entity\User;
 use App\Entity\Reservation;
use App\Entity\Colis;
use Stripe\Checkout\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StripeController extends AbstractController
{   

    #[Route('create-checkout-session/{id}', name:'create_checkout_session')]
    public function createSession(Reservation $reservation)
    {
        
        Stripe::setApiKey('sk_test_51K94UBLAbWwHYcgEU51SaIsjJbaCjslhaWh9asEVrak5egUIzMasX9ANAj96zgxZCPpDkmUPBUvZuVfF63KpnPBX00gopq9McE');

        $mydomain = 'http://127.0.0.1:8000';
        /**
         * @var User $user
         */
        $user = $this->getUser();



         $colis = $reservation->getColis();



        $reservationForStripe = [
            'amount' => $colis->getPrix()*100,
            'quantity' => 1,
            'currency' => Colis::DEVISE,
            'name' => $colis->getReservation()->getReceveur()->getPrenom(),
        ];


        
        
        $checkout_session = Session::create([
            'customer_email' => $user->getEmail(),
            'payment_method_types' => [
                'card',
            ],
            'line_items' => [
                
                $reservationForStripe
   
                ],
   
        
            
            'mode' => 'payment',
            'success_url' => $mydomain . '/paymentsuccess',
            'cancel_url' => $mydomain . '/paymentcancel',
        ]);


        return $this->redirect($checkout_session->url);
  
    }

    
      #[Route('paymentsuccess', name:'payment_success')]
     

     public function paymentSuccess()
     {
        $this->addFlash("Success", "Votre réservation a bien été pris en compte.");
        
        return $this->redirectToRoute("customer_reservation");

     }


    
      #[Route('paymentcancel', name:'payment_cancel')]
     

    public function paymentCancel()
    {
        $this->addFlash("info", "Votre réservation n'a pu aboutir . Vous pouvez essayer avec une autre manière de paiment");
        return $this->redirectToRoute("customer_reservation");

       
    }


}