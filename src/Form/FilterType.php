<?php

namespace App\Form;

use App\Entity\Region;
use App\Entity\Departement;
use App\Entity\EquipementExterieur;
use App\Entity\EquipementInterieur;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            
           
            ->add('region', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'nom',
                'label' => 'Région: ',
                'placeholder' => 'Sélectionnez une région',
                'required' => false,
                'mapped' => false,
            ])
            ->add('departement', EntityType::class, [
                'class' => Departement::class,
                'choice_label' => 'nom',
                'label' => 'Département: ',
                'placeholder' => 'Sélectionnez un département',
                'required' => false,
                'mapped' => false,
            ])
            ->add('ville', EntityType::class, [
                'class' => Ville::class,
                'choice_label' => 'nom',
                'label' => 'Ville: ',
                'placeholder' => 'Sélectionnez une ville',
                'required' => false,
                'mapped' => false,
            ])
            ->add('equiper_int', EntityType::class, [
                'class' => EquipementInterieur::class,
                'choice_label' => 'nom',
                'label' => 'Equipement interieur: ',
                'attr' => ['class' => 'equipement-interieur-checkboxes d-flex flex-row-wrap'],
                'multiple' => true,
                'expanded' => true,
                'mapped' => false,
                ])
            ->add('equiper_ext', EntityType::class, [
                'class' => EquipementExterieur::class,
                'choice_label' => 'nom',
                'label' => 'Equipement exterieur: ',
                'attr' => ['class' => 'equipement-exterieur-checkboxes'],
                'multiple' => true,
                'expanded' => true,
                'mapped' => false,
                ])
            ->add('accept_animaux', CheckboxType::class, [
                'label' => 'Accepte les animaux: ',
                'required' => false,
                'mapped' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilterType::class,
        ]);
    }
}
