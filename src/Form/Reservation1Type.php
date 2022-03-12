<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class Reservation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startedDate', DateType::class, [
                'widget' => 'choice',
                'years' => range( date('Y'), date('Y')+1),
                'required' => false,
                'label' => 'Date d\'envoi du colis',
            ])

            ->add('villeDepart')
            ->add('villeArrivee')
            ->add('expediteur')
            ->add('receveur')
            ->add('colis')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
