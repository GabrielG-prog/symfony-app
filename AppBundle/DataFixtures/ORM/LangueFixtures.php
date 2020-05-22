<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Langue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class LangueFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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
        for ($i = 0; $i < 20; $i++)
        {
            $langue = new Langue();
            $langue->setLibelleLangue($faker->countryCode);
            $manager->persist($langue);
        }
        $manager->flush();
    }
    /**
    * Get the order of this fixture
    * @return integer
    */
    public function getOrder()
    {
        return 7;
    }
}
?>