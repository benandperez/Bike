<?php

namespace App\Form;

use App\Entity\BikeType;
use App\Entity\TypeMembership;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BikeTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('status')
            ->add('typeMembership', EntityType::class,[
                'class' => TypeMembership::class,
                'choice_label' => 'description'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BikeType::class,
        ]);
    }
}
