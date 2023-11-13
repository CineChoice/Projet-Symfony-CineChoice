<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\Movie;
use App\Entity\Session;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('heure')
            #->add('film')
            #->add('salle')

            ->add('film', EntityType::class, [
                'class'=>Movie::class,
                'choice_label'=>'nom',
            ])

            ->add('salle', EntityType::class, [
                'class'=>Room::class,
                'choice_label'=>'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
