<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proposition
 *
 * @ORM\Table(name="proposition")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PropositionRepository")
 */
class Proposition
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_proposition", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Eleve", inversedBy="proposition")
     * @ORM\JoinColumn(name="Eid_eleve_proposition", referencedColumnName="id_eleve")
     */
    private $eleves;

    /**
     * @ORM\ManyToOne(targetEntity="Etablissement", inversedBy="proposition")
     * @ORM\JoinColumn(name="Eid_etablissement_proposition", referencedColumnName="id_etablissement")
     */
    private $etablissements;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setEleves($eleves)
    {
        $this->eleves = $eleves;

        return $this;
    }
    public function getEleves()
    {
        return $this->eleves;
    }

    public function setEtablissements($etablissements)
    {
        $this->etablissements = $etablissements;

        return $this;
    }
    public function getEtablissements()
    {
        return $this->etablissements;
    }
}
