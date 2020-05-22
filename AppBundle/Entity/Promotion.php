<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 */
class Promotion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_promotion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="annee_promo", type="integer")
     */
    private $anneePromo;

    /**
     * @var string
     *
     * @ORM\Column(name="theme_europe_promo", type="string", length=255)
     */
    private $themeEuropePromo;

    /**
     * @var string
     *
     * @ORM\Column(name="chemin_DSP_promo", type="string", length=255)
     */
    private $cheminDSPPromo;

    /**
     * @ORM\OneToMany(targetEntity="Eleve", mappedBy="promotions")
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
     * Set anneePromo.
     *
     * @param int $anneePromo
     *
     * @return Promotion
     */
    public function setAnneePromo($anneePromo)
    {
        $this->anneePromo = $anneePromo;

        return $this;
    }

    /**
     * Get anneePromo.
     *
     * @return int
     */
    public function getAnneePromo()
    {
        return $this->anneePromo;
    }

    /**
     * Set themeEuropePromo.
     *
     * @param string $themeEuropePromo
     *
     * @return Promotion
     */
    public function setThemeEuropePromo($themeEuropePromo)
    {
        $this->themeEuropePromo = $themeEuropePromo;

        return $this;
    }

    /**
     * Get themeEuropePromo.
     *
     * @return string
     */
    public function getThemeEuropePromo()
    {
        return $this->themeEuropePromo;
    }

    /**
     * Set cheminDSPPromo.
     *
     * @param string $cheminDSPPromo
     *
     * @return Promotion
     */
    public function setCheminDSPPromo($cheminDSPPromo)
    {
        $this->cheminDSPPromo = $cheminDSPPromo;

        return $this;
    }

    /**
     * Get cheminDSPPromo.
     *
     * @return string
     */
    public function getCheminDSPPromo()
    {
        return $this->cheminDSPPromo;
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
