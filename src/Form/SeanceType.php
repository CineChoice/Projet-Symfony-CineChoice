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
                'label' => 'date de la séance'
            ])

            ->add('heure', TimeType::class,[
                'input_format' => 'H:i',
                'input'=>'string',
                'label' => 'heure de la séance'
            ])

            ->add('film', EntityType::class, [
                'class'=>Movie::class,
                'choice_label'=>'nom',
                'label' => "Film associé",
                'by_reference'=>false,
                'attr'=>[
                    'class'=>"selectStyles",
                ]
            ])


            /*->add('film', EntityType::class, [
                'class'=>Movie::class,
                'choice_label'=>'nom',
                'label' => "film associées",
                'required'=>false,
                'multiple' => true,
                'by_reference'=>false,
                'attr'=>[
                    'class'=>"selectStyles",
                ]
            ])*/
        

            ->add('salle', EntityType::class, [
                'class'=>Room::class,
                'choice_label'=>'nom',
                'label' => "Salle associée",
                'attr'=>[
                    'class'=>"selectStyles",
                ]
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
