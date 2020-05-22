<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table(name="langue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LangueRepository")
 */
class Langue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_langue", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_langue", type="string", length=255)
     */
    private $libelleLangue;

    /**
     * @ORM\OneToMany(targetEntity="Examinateur", mappedBy="langues")
    */
    private $examinateur;

    /**
     * @ORM\OneToMany(targetEntity="Passer", mappedBy="langues")
    */
    private $passer;


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
     * Set libelleLangue.
     *
     * @param string $libelleLangue
     *
     * @return Langue
     */
    public function setLibelleLangue($libelleLangue)
    {
        $this->libelleLangue = $libelleLangue;

        return $this;
    }

    /**
     * Get libelleLangue.
     *
     * @return string
     */
    public function getLibelleLangue()
    {
        return $this->libelleLangue;
    }

    public function setExaminateur($examinateur)
    {
        $this->examinateur = $examinateur;

        return $this;
    }
    public function getExaminateur()
    {
        return $this->examinateur;
    }

    public function setPasser($passer)
    {
        $this->passer = $passer;

        return $this;
    }
    public function getPasser()
    {
        return $this->passer;
    }
}
