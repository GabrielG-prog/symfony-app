<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Examinateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class ExaminateurFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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
            $examinateur = new Examinateur();
            $examinateur->setNomExaminateur($faker->lastName);
            $examinateur->setPrenomExaminateur($faker->firstName);
            $examinateur->setTelephoneExaminateur($faker->phoneNumber);
            $manager->persist($examinateur);
        }
        $manager->flush();
    }
    /**
    * Get the order of this fixture
    * @return integer
    */
    public function getOrder()
    {
        return 6;
    }
}
?>