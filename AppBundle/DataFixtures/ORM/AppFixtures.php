<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Pays;
use AppBundle\Entity\Classe;
use AppBundle\Entity\Eleve;
use AppBundle\Entity\Etablissement;
use AppBundle\Entity\Examinateur;
use AppBundle\Entity\Langue;
use AppBundle\Entity\Promotion;
use AppBundle\Entity\Passer;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class AppFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) 
        {
            $pays = new Pays();
            $pays->setLibellePays($faker->country);
            $manager->persist($pays);
        }
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin.admin@gmail.com');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setRoles(array("ROLE_ADMIN"));
        $manager->persist($user);
        $eleve_uti = new User();
        $eleve_uti->setUsername('eleve');
        $eleve_uti->setEmail('eleve.eleve@gmail.com');
        $eleve_uti->setPlainPassword('eleve');
        $eleve_uti->setEnabled(true);
        $eleve_uti->setRoles(array("ROLE_USER"));
        $manager->persist($eleve_uti);
        $objetPromotion = array();
        $lesChemins = [
            '2014',
            '2013',
            '2012',
            '2011',
            '2010',
            '2009',
            '2008',
            '2007',
            '2006',
            '2005',
            '2004',
            '2003',
            '2002',
            '2001',
            '2000',
            '1999',
            '1998',
            '1997',
            '1996',
            '1995'
        ];
        
        for ($i = 0; $i < 20; $i++)
        {
            $promotion = new Promotion();
            $promotion->setAnneePromo($faker->year);
            $promotion->setThemeEuropePromo($faker->word);
            $promotion->setCheminDSPPromo("Chemin/Promos/",$lesChemins[$i]);
            $manager->persist($promotion);
            array_push($objetPromotion, $promotion);
        }
        $objetClasse = [];
        $lesClasses = [
            '2nde 1',
            '2nde 2',
            '2nde 3',
            '2nde 4',
            '2nde 5',
            '2nde 6',
            '2nde 7',
            '1ere STMG',
            '1ere ST2S',
            '1ere L',
            '1ere ES1',
            '1ere ES2',
            '1ere S1',
            '1ere S2',
            '1ere S3',
        ];
        for ($i = 0; $i < 15; $i++)
        {
            $classe = new Classe();
            $classe->setLibelleClasse($lesClasses[$i]);
            $manager->persist($classe);
            array_push($objetClasse, $classe);
        }
        for ($i = 0; $i < 100; $i++)
        {
            $eleve = new Eleve();
            $eleve->setNomEleve($faker->lastName);
            $eleve->setPrenomEleve($faker->firstName);
            $eleve->setSexeEleve($faker->randomElement($array = array ('H','F')));
            $eleve->setDateNaissEleve($faker->datetime);
            $eleve->setPromoEleve($faker->numberBetween($min = 1999, $max = 2003));
            $eleve->setEmailEleve($faker->email);
            $eleve->setEmailParentEleve($faker->email);
            $eleve->setMotDePasseEleve($faker->password);
            $eleve->setCommentairesGeneralEleve($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setTerreDesLanguesEleve($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setCommentairesChoixEleve($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setVisaParentEleve($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setUe2DateEleve($faker->datetime);
            $eleve->setUe2ThemeDossierEleve($faker->word);
            $eleve->setUe2NoteEleve($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 20));
            $eleve->setUe2AppreciationsEleve($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setTypeEleve($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setUe1DateUcape($faker->datetime);
            $eleve->setUe1NoteUcape($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 20));
            $eleve->setUe1AppreciationsUcape($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setObtentionDiplomeUcape($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setMentionUcape($faker->word);
            $eleve->setCommentairesUcape($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setClasses($objetClasse[rand(1,9)]);
            $eleve->setAvoyage($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setAnneeentreepromo($faker->datetime);
            $eleve->setPromotions($objetPromotion[rand(0,19)]);
            $manager->persist($eleve);
        }
        for ($i = 0; $i < 10; $i++) 
        {
            $etablissement = new Etablissement();
            $etablissement->setNomEtablissement($faker->company);
            $etablissement->setTelEtablissement($faker->phoneNumber);
            $etablissement->setEmailEtablissement($faker->email);
            $etablissement->setResponsableEtablissement($faker->firstName);
            $etablissement->setNumeroEtablissement($faker->numberBetween($min = 1, $max = 50));
            $etablissement->setRueEtablissement($faker->address);
            $etablissement->setVilleEtablissement($faker->city);
            $manager->persist($etablissement);
        }
        for ($i = 0; $i < 20; $i++)
        {
            $examinateur = new Examinateur();
            $examinateur->setNomExaminateur($faker->lastName);
            $examinateur->setPrenomExaminateur($faker->firstName);
            $examinateur->setTelephoneExaminateur($faker->phoneNumber);
            $manager->persist($examinateur);
        }
        for ($i = 0; $i < 20; $i++)
        {
            $langue = new Langue();
            $langue->setLibelleLangue($faker->countryCode);
            $manager->persist($langue);
        }
        for ($i = 0; $i < 20; $i++)
        {
            $passer = new Passer();
            $passer->setDatePasser(new \DateTime($faker->date));
            $passer->setNotePasser($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 20));
            $passer->setAppreciationPasser($faker->catchPhrase);
            $manager->persist($passer);
        }
        $manager->flush();
    }
}
?>