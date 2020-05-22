<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaysRepository")
 */
class Pays
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pays", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_pays", type="string", length=255)
     */
    private $libellePays;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Choix", mappedBy="pays")
    */
    private $choix;

    /**
     * @ORM\OneToMany(targetEntity="Etablissement", mappedBy="pays")
    */
    private $etablissement;

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
     * Set libellePays.
     *
     * @param string $libellePays
     *
     * @return Pays
     */
    public function setLibellePays($libellePays)
    {
        $this->libellePays = $libellePays;

        return $this;
    }

    /**
     * Get libellePays.
     *
     * @return string
     */
    public function getLibellePays()
    {
        return $this->libellePays;
    }

    public function setChoix($choix)
    {
        $this->choix = $choix;

        return $this;
    }
    public function getChoix()
    {
        return $this->choix;
    }

    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }
    public function getEtablissement()
    {
        return $this->etablissement;
    }
}
