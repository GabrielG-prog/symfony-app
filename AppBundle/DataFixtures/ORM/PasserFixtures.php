<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Passer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class PasserFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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
            $passer = new Passer();
            $passer->setDatePasser(new \DateTime($faker->date));
            $passer->setNotePasser($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 20));
            $passer->setAppreciationPasser($faker->catchPhrase);
            $manager->persist($passer);
        }
        $manager->flush();
    }
    /**
    * Get the order of this fixture
    * @return integer
    */
    public function getOrder()
    {
        return 8;
    }
}
?>