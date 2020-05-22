<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choix
 *
 * @ORM\Table(name="Choix")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChoixRepository")
 */
class Choix
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_choix", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Pays", inversedBy="choix")
     * @ORM\JoinColumn(name="Eid_pays_choix", referencedColumnName="id_pays")
     */
    private $pays;

    /**
     * @ORM\ManyToOne(targetEntity="Eleve", inversedBy="choix")
     * @ORM\JoinColumn(name="Eid_eleve_choix", referencedColumnName="id_eleve")
     */
    private $eleves;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set pays.
     *
     * @param int $pays
     *
     * @return Pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays.
     *
     * @return Pays
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set eleve.
     *
     * @param int $eleve
     *
     * @return Eleve
     */
    public function setEleves($eleves)
    {
        $this->eleves = $eleves;

        return $this;
    }

    /**
     * Get eleve.
     *
     * @return Eleve
     */
    public function getEleves()
    {
        return $this->eleves;
    }
}
