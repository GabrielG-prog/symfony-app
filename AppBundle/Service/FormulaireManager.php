<?php

namespace AppBundle\Service;

use AppBundle\Entity\Pays;
use AppBundle\Entity\Etablisement;
use AppBundle\Entity\Eleve;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FormulaireManager
{
    private $doctrine;
    
    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    } 
}