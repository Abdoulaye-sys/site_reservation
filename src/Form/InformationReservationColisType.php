<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InformationReservationColisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'type_colis',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Votre Colis',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner votre colis']),
                    ]
                ]
            )

            ->add(
                'poids_colis',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Poids',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner le poids de votre colis']),
                    ]
                ]
            )



            ->add(
                'ville_depart',
                ChoiceType::class,
                [
                    'choices'  => [
                        'Paris'     => 'paris',
                        'Dakar'    => 'dakar',
                    ],
                ]
            )



            ->add(
                'ville_arrivee',
                ChoiceType::class,
                [
                    'choices'  => [
                        'Dakar'    => 'dakar',
                        'Paris'     => 'paris',
                    ],
                ]
            )


            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
                'label' => 'Date d\'envoi du colis',
            ])


            ->add(
                'nom_receveur',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Nom du destinataire',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner le nom du destinataire']),
                    ]
                ]
            )


            ->add(
                'prenom_receveur',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Prenom du destinataire',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner le prenom du destinataire']),
                    ]
                ]
            )


            ->add(
                'telephone_receveur',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Numero de telephone du destinataire',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner le numero du destinataire']),
                    ]
                ]
            )
            ->add(
                'code_receveur',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Numero de code du destinataire',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner le code du destinataire']),
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
