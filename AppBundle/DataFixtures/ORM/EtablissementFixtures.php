<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Etablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class EtablissementFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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
        $manager->flush();
    }
    /**
    * Get the order of this fixture
    * @return integer
    */
    public function getOrder()
    {
        return 5;
    }
}
?>