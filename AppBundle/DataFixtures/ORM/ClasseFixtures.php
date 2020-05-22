<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Classe;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ClasseFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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
            $this->addReference('classes', $objetClasse);
        }
        
        $manager->flush();
    }
    /**
    * Get the order of this fixture
    * @return integer
    */
    public function getOrder()
    {
        return 2;
    }
}
?>