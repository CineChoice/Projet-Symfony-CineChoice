<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\Movie;
use App\Entity\Session;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class,[
                'input'=>'string',
            ])

            ->add('heure', TimeType::class,[
                'input_format' => 'H:i',
                'input'=>'string'
            ])

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
