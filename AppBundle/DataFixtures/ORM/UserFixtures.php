<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class UserFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
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

        $manager->flush();
    }
    /**
    * Get the order of this fixture
    * @return integer
    */
    public function getOrder()
    {
        return 10;
    }
}
?>