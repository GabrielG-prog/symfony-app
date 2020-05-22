<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class PromoFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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
            $this->addReference('promotions', $objetPromotion);
        }
        $manager->flush();
    }
    /**
    * Get the order of this fixture
    * @return integer
    */
    public function getOrder()
    {
        return 3;
    }
}
?>