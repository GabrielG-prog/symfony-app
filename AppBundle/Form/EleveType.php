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
use AppBundle\Entity\Eleve;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEleve', TextType::class, [
                'label' => 'Nom de l\'élève',
            ])
            ->add('prenomEleve', TextType::class, [
                'label' => 'Prenom de l\'élève',
            ])
            ->add('sexeEleve', TextType::class, [
                'label' => 'Sexe de l\'élève',
            ])
            ->add('dateNaissEleve', TextType::class, [
                'label' => 'Date de Naissance de l\'élève',
            ])
            ->add('promoEleve', TextType::class, [
                'label' => 'Promotion de l\'élève',
            ])
            
            ->add('emailEleve', TextType::class, [
                'label' => 'Adresse e-mail de l\'élève',
            ])
            
            ->add('emailParentEleve', TextType::class, [
                'label' => 'Adresse e-mail du parent de l\'élève',
            ])
            
            ->add('motDePasseEleve', TextType::class, [
                'label' => 'Mot de passe de l\'élève',
            ])
            
            ->add('commentairesGeneralEleve', TextType::class, [
                'label' => 'Commentaires général de l\'élève',
            ])
            
            ->add('terreDesLanguesEleve', TextType::class, [
                'label' => 'Terres des langues de l\'élève',
            ])
            
            ->add('commentairesChoixEleve', TextType::class, [
                'label' => 'Commentaires des choix de l\'élève',
            ])
            
            ->add('visaParentEleve', TextType::class, [
                'label' => 'Visa des parents de l\'élève',
            ])
            
            ->add('ue2DateEleve', TextType::class, [
                'label' => 'Date des ue2 de l\'élève',
            ])
            
            ->add('ue2ThemeDossierEleve', TextType::class, [
                'label' => 'Theme du dossier d\'ue2 de l\'élève',
            ])
            
            ->add('ue2NoteEleve', TextType::class, [
                'label' => 'Note ue2 de l\'élève',
            ])
            
            ->add('ue2AppreciationsEleve', TextType::class, [
                'label' => 'Appreciations ue2 de l\'élève',
            ])
            
            ->add('typeEleve', TextType::class, [
                'label' => 'Type de l\'élève',
            ])
            
            ->add('ue1DateUcape', TextType::class, [
                'label' => 'Date ue1 de l\'élève',
            ])
            
            ->add('ue1NoteUcape', TextType::class, [
                'label' => 'Note ue1 de l\'élève',
            ])
            
            ->add('ue1AppreciationsUcape', TextType::class, [
                'label' => 'Appreciations ue1 de l\'élève',
            ])
            
            ->add('obtentionDiplomeUcape', TextType::class, [
                'label' => 'Obtention du diplôme Ucape de l\'élève',
            ])
            
            ->add('mentionUcape', TextType::class, [
                'label' => 'Mention ucape de l\'élève',
            ])
            
            ->add('commentairesUcape', TextType::class, [
                'label' => 'Commentaires ucape de l\'élève',
            ])
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
    
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Eleve'
        ));
    }
}