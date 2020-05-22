<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClasseRepository")
 */
class Classe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_classe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_classe", type="string", length=255)
     */
    private $libelleClasse;

    /**
     * @ORM\OneToMany(targetEntity="Eleve", mappedBy="classes")
    */
    private $eleve;


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
     * Set libelleClasse.
     *
     * @param string $libelleClasse
     *
     * @return Classe
     */
    public function setLibelleClasse($libelleClasse)
    {
        $this->libelleClasse = $libelleClasse;

        return $this;
    }

    /**
     * Get libelleClasse.
     *
     * @return string
     */
    public function getLibelleClasse()
    {
        return $this->libelleClasse;
    }
    public function setEleve($eleve)
    {
        $this->eleve = $eleve;

        return $this;
    }
    public function getEleve()
    {
        return $this->eleve;
    }
}
