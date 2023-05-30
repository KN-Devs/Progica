<?php

namespace App\Form;

use App\Entity\Region;
use App\Entity\Departement;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('surface')
            ->add('nb_chambres')
            ->add('nb_lits')
            ->add('accept_animaux', CheckboxType::class, [
                'label' => 'Accepte les animaux',
                'required' => false,
            ])
            ->add('image')
            ->add('region', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'nom',
                'label' => 'Région',
                'placeholder' => 'Sélectionnez une région',
                'required' => false,
                'mapped' => false,
            ])
            ->add('departement', EntityType::class, [
                'class' => Departement::class,
                'choice_label' => 'nom',
                'label' => 'Département',
                'placeholder' => 'Sélectionnez un département',
                'required' => false,
                'mapped' => false,
            ])
            ->add('ville', EntityType::class, [
                'class' => Ville::class,
                'choice_label' => 'nom',
                'label' => 'Ville',
                'placeholder' => 'Sélectionnez une ville',
                'required' => false,
                'mapped' => false,
            ])
            ->add('prix')
            ->add('equiper_int')
            ->add('equiper_ext')
            ->add('gite_has_service')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilterType::class,
        ]);
    }
}
