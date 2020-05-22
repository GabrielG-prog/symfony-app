<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEtablissement', TextType::class, [
                    'label' => 'Nom de l\'établissement',

                ])
        
            ->add('telEtablissement', TextType::class, [
                'label' => 'Téléphone de l\'établissement',
                
            ])
        
            ->add('emailEtablissement', TextType::class, [
                'label' => 'Adresse e-mail de l\'établissement',
                
            ])
        
            ->add('responsableEtablissement', TextType::class, [
                'label' => 'Responsable de l\'établissement',
                
            ])
        
            ->add('numeroEtablissement', IntegerType::class, [
                'label' => 'Numéro de l\'établissement',
                
            ])
        
            ->add('rueEtablissement', TextType::class, [
                'label' => 'Rue de l\'établissement',
                
            ])
        
            ->add('villeEtablissement', TextType::class, [
                'label' => 'Ville de l\'établissement',
                
            ])
            ->add('pays', EntityType::class, array(
                'class'        => 'AppBundle\Entity\Pays',
                'choice_label' => 'libellePays',
                'multiple'     => false,
                'expanded'     => false,
              ))
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
      
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etablissement',
            'is_edit' => false
        ));
    }
}