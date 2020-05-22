<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Eleve;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class EleveFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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
        for ($i = 0; $i < 100; $i++)
        {
            $objetClasse = $this->getReference('classes');
            $objetPromotion = $this->getReference('promotions');
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
        $manager->flush();
    }
    public function getOrder()
    {
        return 4;
    }
}
?>