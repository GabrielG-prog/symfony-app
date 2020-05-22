<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Choix;

class ChoixType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('choixPays1', EntityClass::class, [
                'class' => Pays::class,
                'label' => 'Choix du pays n°1 : ',
                'choice_label' => 'libelle_pays',    
            ])
            ->add('choixPays2', EntityClass::class, [
                'class' => Pays::class,
                'label' => 'Choix du pays n°2 : ',
                'choice_label' => 'libelle_pays',    
            ])
            ->add('choixPays3', EntityClass::class, [
                'class' => Pays::class,
                'label' => 'Choix du pays n°3 : ',
                'choice_label' => 'libelle_pays',    
            ])
            ->add('choixTerreDesLangues', ChoiceType::class, [
                'class' => Pays::class,
                'label' => 'Choix du pays n°1 : ',
                'choice_label' => 'libelle_pays',    
            ])
            ->add('commentaires', TextareaType::class);
    }
}