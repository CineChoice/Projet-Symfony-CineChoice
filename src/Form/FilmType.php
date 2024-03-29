<?php

namespace App\Form;

use App\Entity\Movie;
use App\Entity\Session;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Titre du film",
                'required' => false,
                'attr' => [
                    "placeholder" => "Saisir le titre du film"
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description du film",
                'attr' => [
                    'required' => false,
                    "placeholder" => "Saisir la description du film"
                ]
            ])
            ->add('affiche', HiddenType::class)
            ->add('afficheFile', FileType::class, [
                'mapped'=>false,
                'required'=>false,
                'label'=>"Charger l'affiche du film",
                'attr'=>[
                    'accept'=>".jpg,.png"
                ],
                'row_attr'=>[
                    'class'=>"d-none"
                ]
            ])
            ->add('date', IntegerType::class, [
                'label'=>"Date de sortie",
                'attr'=>[
                    'required'=>false,
                    "placeholder"=>"Saisir la date de sortie du film"
                ]
            ])
            ->add('categories', EntityType::class, [
                'class'=>Category::class,
                'choice_label'=>'nom',
                'label' => "Catégorie(s) associées",
                'required'=>false,
                'multiple' => true,
                'by_reference'=>false,
                'attr'=>[
                    'class'=>"selectStyles",
                ]
            ])
            ->add('sessions', EntityType::class, [
                'class'=>Session::class,
                'choice_label'=>'id',
                'label' => "Séance(s) associées",
                'required'=>false,
                'multiple' => true,
                'by_reference'=>false,
                'attr'=>[
                    'class'=>"selectStyles",
                ]
            ])
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
