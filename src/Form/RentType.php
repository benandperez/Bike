<?php

namespace App\Form;

use App\Entity\Bike;
use App\Entity\Client;
use App\Entity\Rent;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('days')
            ->add('status')
            ->add('bike', EntityType::class,[
                'class' => Bike::class,
                'choice_label' => 'description'
            ])
            ->add('client', EntityType::class,[
                'class' => Client::class,
                'choice_label' => 'firstName'
            ])
            ->add('bikeType', EntityType::class,[
                'class' => \App\Entity\BikeType::class,
                'choice_label' => 'description'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rent::class,
        ]);
    }
}
