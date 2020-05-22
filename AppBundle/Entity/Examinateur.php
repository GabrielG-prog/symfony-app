<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examinateur
 *
 * @ORM\Table(name="examinateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExaminateurRepository")
 */
class Examinateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_examinateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_examinateur", type="string", length=255)
     */
    private $nomExaminateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_examinateur", type="string", length=255)
     */
    private $prenomExaminateur;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_examinateur", type="string", length=255)
     */
    private $telephoneExaminateur;

    /**
     * @ORM\ManyToOne(targetEntity="Langue", inversedBy="examinateur")
     * @ORM\JoinColumn(name="Eid_langue", referencedColumnName="id_langue")
    */
    private $langues;

    /**
     * @ORM\OneToMany(targetEntity="Passer", mappedBy="examinateurs")
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
     * Set nomExaminateur.
     *
     * @param string $nomExaminateur
     *
     * @return Examinateur
     */
    public function setNomExaminateur($nomExaminateur)
    {
        $this->nomExaminateur = $nomExaminateur;

        return $this;
    }

    /**
     * Get nomExaminateur.
     *
     * @return string
     */
    public function getNomExaminateur()
    {
        return $this->nomExaminateur;
    }

    /**
     * Set prenomExaminateur.
     *
     * @param string $prenomExaminateur
     *
     * @return Examinateur
     */
    public function setPrenomExaminateur($prenomExaminateur)
    {
        $this->prenomExaminateur = $prenomExaminateur;

        return $this;
    }

    /**
     * Get prenomExaminateur.
     *
     * @return string
     */
    public function getPrenomExaminateur()
    {
        return $this->prenomExaminateur;
    }

    /**
     * Set telephoneExaminateur.
     *
     * @param string $telephoneExaminateur
     *
     * @return Examinateur
     */
    public function setTelephoneExaminateur($telephoneExaminateur)
    {
        $this->telephoneExaminateur = $telephoneExaminateur;

        return $this;
    }

    /**
     * Get telephoneExaminateur.
     *
     * @return string
     */
    public function getTelephoneExaminateur()
    {
        return $this->telephoneExaminateur;
    }
    public function setLangues($langues)
    {
        $this->langues = $langues;

        return $this;
    }
    public function getLangues()
    {
        return $this->langues;
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
