<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtablissementRepository")
 */
class Etablissement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_etablissement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_etablissement", type="string", length=255)
     */
    private $nomEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_etablissement", type="string", length=255)
     */
    private $telEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="email_etablissement", type="string", length=255)
     */
    private $emailEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_etablissement", type="string", length=255)
     */
    private $responsableEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_etablissement", type="string", length=255)
     */
    private $numeroEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="rue_etablissement", type="string", length=255)
     */
    private $rueEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_etablissement", type="string", length=255)
     */
    private $villeEtablissement;

    /**
     * @ORM\ManyToOne(targetEntity="Pays", inversedBy="etablissement")
     * @ORM\JoinColumn(name="Eid_pays", referencedColumnName="id_pays")
    */
    private $pays;

    /**
     * @ORM\OneToMany(targetEntity="Proposition", mappedBy="etablissements")
    */
    private $proposition;


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
     * Set nomEtablissement.
     *
     * @param string $nomEtablissement
     *
     * @return Etablissement
     */
    public function setNomEtablissement($nomEtablissement)
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    /**
     * Get nomEtablissement.
     *
     * @return string
     */
    public function getNomEtablissement()
    {
        return $this->nomEtablissement;
    }

    /**
     * Set telEtablissement.
     *
     * @param string $telEtablissement
     *
     * @return Etablissement
     */
    public function setTelEtablissement($telEtablissement)
    {
        $this->telEtablissement = $telEtablissement;

        return $this;
    }

    /**
     * Get telEtablissement.
     *
     * @return string
     */
    public function getTelEtablissement()
    {
        return $this->telEtablissement;
    }

    /**
     * Set emailEtablissement.
     *
     * @param string $emailEtablissement
     *
     * @return Etablissement
     */
    public function setEmailEtablissement($emailEtablissement)
    {
        $this->emailEtablissement = $emailEtablissement;

        return $this;
    }

    /**
     * Get emailEtablissement.
     *
     * @return string
     */
    public function getEmailEtablissement()
    {
        return $this->emailEtablissement;
    }

    /**
     * Set responsableEtablissement.
     *
     * @param string $responsableEtablissement
     *
     * @return Etablissement
     */
    public function setResponsableEtablissement($responsableEtablissement)
    {
        $this->responsableEtablissement = $responsableEtablissement;

        return $this;
    }

    /**
     * Get responsableEtablissement.
     *
     * @return string
     */
    public function getResponsableEtablissement()
    {
        return $this->responsableEtablissement;
    }

    /**
     * Set numeroEtablissement.
     *
     * @param string $numeroEtablissement
     *
     * @return Etablissement
     */
    public function setNumeroEtablissement($numeroEtablissement)
    {
        $this->numeroEtablissement = $numeroEtablissement;

        return $this;
    }

    /**
     * Get numeroEtablissement.
     *
     * @return string
     */
    public function getNumeroEtablissement()
    {
        return $this->numeroEtablissement;
    }

    /**
     * Set rueEtablissement.
     *
     * @param string $rueEtablissement
     *
     * @return Etablissement
     */
    public function setRueEtablissement($rueEtablissement)
    {
        $this->rueEtablissement = $rueEtablissement;

        return $this;
    }

    /**
     * Get rueEtablissement.
     *
     * @return string
     */
    public function getRueEtablissement()
    {
        return $this->rueEtablissement;
    }

    /**
     * Set villeEtablissement.
     *
     * @param string $villeEtablissement
     *
     * @return Etablissement
     */
    public function setVilleEtablissement($villeEtablissement)
    {
        $this->villeEtablissement = $villeEtablissement;

        return $this;
    }

    /**
     * Get villeEtablissement.
     *
     * @return string
     */
    public function getVilleEtablissement()
    {
        return $this->villeEtablissement;
    }
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }
    public function getPays()
    {
        return $this->pays;
    }

    public function setProposition($proposition)
    {
        $this->proposition = $proposition;

        return $this;
    }
    public function getProposition()
    {
        return $this->proposition;
    }
    
}
