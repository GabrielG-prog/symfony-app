<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EleveRepository")
 */
class Eleve
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_eleve", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_eleve", type="string", length=255)
     */
    private $nomEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_eleve", type="string", length=255)
     */
    private $prenomEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe_eleve", type="string", length=255)
     */
    private $sexeEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naiss_eleve", type="date")
     */
    private $dateNaissEleve;

    /**
     * @var int
     *
     * @ORM\Column(name="promo_eleve", type="integer")
     */
    private $promoEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="email_eleve", type="string", length=255)
     */
    private $emailEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="email_parent_eleve", type="string", length=255)
     */
    private $emailParentEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe_eleve", type="string", length=255)
     */
    private $motDePasseEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_general_eleve", type="text")
     */
    private $commentairesGeneralEleve;

    /**
     * @var bool
     *
     * @ORM\Column(name="terre_des_langues_eleve", type="boolean")
     */
    private $terreDesLanguesEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_choix_eleve", type="text")
     */
    private $commentairesChoixEleve;

    /**
     * @var bool
     *
     * @ORM\Column(name="visa_parent_eleve", type="boolean")
     */
    private $visaParentEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UE2_date_eleve", type="date")
     */
    private $uE2DateEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="UE2_theme_dossier_eleve", type="string", length=255)
     */
    private $uE2ThemeDossierEleve;

    /**
     * @var float
     *
     * @ORM\Column(name="UE2_note_eleve", type="float")
     */
    private $uE2NoteEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="UE2_appreciations_eleve", type="text")
     */
    private $uE2AppreciationsEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="type_eleve", type="string", length=255)
     */
    private $typeEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UE1_date_ucape", type="date")
     */
    private $uE1DateUcape;

    /**
     * @var float
     *
     * @ORM\Column(name="UE1_note_ucape", type="float")
     */
    private $uE1NoteUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="UE1_appreciations_ucape", type="text")
     */
    private $uE1AppreciationsUcape;

    /**
     * @var bool
     *
     * @ORM\Column(name="obtention_diplome_ucape", type="boolean")
     */
    private $obtentionDiplomeUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="mention_ucape", type="string", length=255)
     */
    private $mentionUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_ucape", type="text")
     */
    private $commentairesUcape;

    /**
     * @var bool
     *
     * @ORM\Column(name="aVoyage", type="boolean")
     */
    private $aVoyage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="anneeEntreePromo", type="date")
     */
    private $anneeEntreePromo;

    /**
     * @ORM\ManyToOne(targetEntity="Classe", inversedBy="eleve")
     * @ORM\JoinColumn(name="Eid_classe", referencedColumnName="id_classe")
    */
    private $classes;

    /**
     * @ORM\OneToMany(targetEntity="Choix", mappedBy="eleves")
    */
    private $choix;

    /**
     * @ORM\OneToMany(targetEntity="Proposition", mappedBy="eleves")
    */
    private $proposition;

    /**
     * @ORM\OneToMany(targetEntity="Passer", mappedBy="eleves")
    */
    private $passer;

    /**
     * @ORM\ManyToOne(targetEntity="Promotion", inversedBy="eleve")
     * @ORM\JoinColumn(name="Eid_promotion", referencedColumnName="id_promotion")
    */
    private $promotions;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="eleve")
     * @ORM\JoinColumn(name="Eid_utilisateur", referencedColumnName="id_utilisateur")
    */
    private $utilisateurId;


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
     * Set nomEleve.
     *
     * @param string $nomEleve
     *
     * @return Eleve
     */
    public function setNomEleve($nomEleve)
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    /**
     * Get nomEleve.
     *
     * @return string
     */
    public function getNomEleve()
    {
        return $this->nomEleve;
    }

    /**
     * Set prenomEleve.
     *
     * @param string $prenomEleve
     *
     * @return Eleve
     */
    public function setPrenomEleve($prenomEleve)
    {
        $this->prenomEleve = $prenomEleve;

        return $this;
    }

    /**
     * Get prenomEleve.
     *
     * @return string
     */
    public function getPrenomEleve()
    {
        return $this->prenomEleve;
    }

    /**
     * Set sexeEleve.
     *
     * @param string $sexeEleve
     *
     * @return Eleve
     */
    public function setSexeEleve($sexeEleve)
    {
        $this->sexeEleve = $sexeEleve;

        return $this;
    }

    /**
     * Get sexeEleve.
     *
     * @return string
     */
    public function getSexeEleve()
    {
        return $this->sexeEleve;
    }

    /**
     * Set dateNaissEleve.
     *
     * @param \DateTime $dateNaissEleve
     *
     * @return Eleve
     */
    public function setDateNaissEleve($dateNaissEleve)
    {
        $this->dateNaissEleve = $dateNaissEleve;

        return $this;
    }

    /**
     * Get dateNaissEleve.
     *
     * @return \DateTime
     */
    public function getDateNaissEleve()
    {
        return $this->dateNaissEleve;
    }

    /**
     * Set promoEleve.
     *
     * @param int $promoEleve
     *
     * @return Eleve
     */
    public function setPromoEleve($promoEleve)
    {
        $this->promoEleve = $promoEleve;

        return $this;
    }

    /**
     * Get promoEleve.
     *
     * @return int
     */
    public function getPromoEleve()
    {
        return $this->promoEleve;
    }

    /**
     * Set emailEleve.
     *
     * @param string $emailEleve
     *
     * @return Eleve
     */
    public function setEmailEleve($emailEleve)
    {
        $this->emailEleve = $emailEleve;

        return $this;
    }

    /**
     * Get emailEleve.
     *
     * @return string
     */
    public function getEmailEleve()
    {
        return $this->emailEleve;
    }

    /**
     * Set emailParentEleve.
     *
     * @param string $emailParentEleve
     *
     * @return Eleve
     */
    public function setEmailParentEleve($emailParentEleve)
    {
        $this->emailParentEleve = $emailParentEleve;

        return $this;
    }

    /**
     * Get emailParentEleve.
     *
     * @return string
     */
    public function getEmailParentEleve()
    {
        return $this->emailParentEleve;
    }

    /**
     * Set motDePasseEleve.
     *
     * @param string $motDePasseEleve
     *
     * @return Eleve
     */
    public function setMotDePasseEleve($motDePasseEleve)
    {
        $this->motDePasseEleve = $motDePasseEleve;

        return $this;
    }

    /**
     * Get motDePasseEleve.
     *
     * @return string
     */
    public function getMotDePasseEleve()
    {
        return $this->motDePasseEleve;
    }

    /**
     * Set commentairesGeneralEleve.
     *
     * @param string $commentairesGeneralEleve
     *
     * @return Eleve
     */
    public function setCommentairesGeneralEleve($commentairesGeneralEleve)
    {
        $this->commentairesGeneralEleve = $commentairesGeneralEleve;

        return $this;
    }

    /**
     * Get commentairesGeneralEleve.
     *
     * @return string
     */
    public function getCommentairesGeneralEleve()
    {
        return $this->commentairesGeneralEleve;
    }

    /**
     * Set terreDesLanguesEleve.
     *
     * @param bool $terreDesLanguesEleve
     *
     * @return Eleve
     */
    public function setTerreDesLanguesEleve($terreDesLanguesEleve)
    {
        $this->terreDesLanguesEleve = $terreDesLanguesEleve;

        return $this;
    }

    /**
     * Get terreDesLanguesEleve.
     *
     * @return bool
     */
    public function getTerreDesLanguesEleve()
    {
        return $this->terreDesLanguesEleve;
    }

    /**
     * Set commentairesChoixEleve.
     *
     * @param string $commentairesChoixEleve
     *
     * @return Eleve
     */
    public function setCommentairesChoixEleve($commentairesChoixEleve)
    {
        $this->commentairesChoixEleve = $commentairesChoixEleve;

        return $this;
    }

    /**
     * Get commentairesChoixEleve.
     *
     * @return string
     */
    public function getCommentairesChoixEleve()
    {
        return $this->commentairesChoixEleve;
    }

    /**
     * Set visaParentEleve.
     *
     * @param bool $visaParentEleve
     *
     * @return Eleve
     */
    public function setVisaParentEleve($visaParentEleve)
    {
        $this->visaParentEleve = $visaParentEleve;

        return $this;
    }

    /**
     * Get visaParentEleve.
     *
     * @return bool
     */
    public function getVisaParentEleve()
    {
        return $this->visaParentEleve;
    }

    /**
     * Set uE2DateEleve.
     *
     * @param \DateTime $uE2DateEleve
     *
     * @return Eleve
     */
    public function setUE2DateEleve($uE2DateEleve)
    {
        $this->uE2DateEleve = $uE2DateEleve;

        return $this;
    }

    /**
     * Get uE2DateEleve.
     *
     * @return \DateTime
     */
    public function getUE2DateEleve()
    {
        return $this->uE2DateEleve;
    }

    /**
     * Set uE2ThemeDossierEleve.
     *
     * @param string $uE2ThemeDossierEleve
     *
     * @return Eleve
     */
    public function setUE2ThemeDossierEleve($uE2ThemeDossierEleve)
    {
        $this->uE2ThemeDossierEleve = $uE2ThemeDossierEleve;

        return $this;
    }

    /**
     * Get uE2ThemeDossierEleve.
     *
     * @return string
     */
    public function getUE2ThemeDossierEleve()
    {
        return $this->uE2ThemeDossierEleve;
    }

    /**
     * Set uE2NoteEleve.
     *
     * @param float $uE2NoteEleve
     *
     * @return Eleve
     */
    public function setUE2NoteEleve($uE2NoteEleve)
    {
        $this->uE2NoteEleve = $uE2NoteEleve;

        return $this;
    }

    /**
     * Get uE2NoteEleve.
     *
     * @return float
     */
    public function getUE2NoteEleve()
    {
        return $this->uE2NoteEleve;
    }

    /**
     * Set uE2AppreciationsEleve.
     *
     * @param string $uE2AppreciationsEleve
     *
     * @return Eleve
     */
    public function setUE2AppreciationsEleve($uE2AppreciationsEleve)
    {
        $this->uE2AppreciationsEleve = $uE2AppreciationsEleve;

        return $this;
    }

    /**
     * Get uE2AppreciationsEleve.
     *
     * @return string
     */
    public function getUE2AppreciationsEleve()
    {
        return $this->uE2AppreciationsEleve;
    }

    /**
     * Set typeEleve.
     *
     * @param string $typeEleve
     *
     * @return Eleve
     */
    public function setTypeEleve($typeEleve)
    {
        $this->typeEleve = $typeEleve;

        return $this;
    }

    /**
     * Get typeEleve.
     *
     * @return string
     */
    public function getTypeEleve()
    {
        return $this->typeEleve;
    }

    /**
     * Set uE1DateUcape.
     *
     * @param \DateTime $uE1DateUcape
     *
     * @return Eleve
     */
    public function setUE1DateUcape($uE1DateUcape)
    {
        $this->uE1DateUcape = $uE1DateUcape;

        return $this;
    }

    /**
     * Get uE1DateUcape.
     *
     * @return \DateTime
     */
    public function getUE1DateUcape()
    {
        return $this->uE1DateUcape;
    }

    /**
     * Set uE1NoteUcape.
     *
     * @param float $uE1NoteUcape
     *
     * @return Eleve
     */
    public function setUE1NoteUcape($uE1NoteUcape)
    {
        $this->uE1NoteUcape = $uE1NoteUcape;

        return $this;
    }

    /**
     * Get uE1NoteUcape.
     *
     * @return float
     */
    public function getUE1NoteUcape()
    {
        return $this->uE1NoteUcape;
    }

    /**
     * Set uE1AppreciationsUcape.
     *
     * @param string $uE1AppreciationsUcape
     *
     * @return Eleve
     */
    public function setUE1AppreciationsUcape($uE1AppreciationsUcape)
    {
        $this->uE1AppreciationsUcape = $uE1AppreciationsUcape;

        return $this;
    }

    /**
     * Get uE1AppreciationsUcape.
     *
     * @return string
     */
    public function getUE1AppreciationsUcape()
    {
        return $this->uE1AppreciationsUcape;
    }

    /**
     * Set obtentionDiplomeUcape.
     *
     * @param bool $obtentionDiplomeUcape
     *
     * @return Eleve
     */
    public function setObtentionDiplomeUcape($obtentionDiplomeUcape)
    {
        $this->obtentionDiplomeUcape = $obtentionDiplomeUcape;

        return $this;
    }

    /**
     * Get obtentionDiplomeUcape.
     *
     * @return bool
     */
    public function getObtentionDiplomeUcape()
    {
        return $this->obtentionDiplomeUcape;
    }

    /**
     * Set mentionUcape.
     *
     * @param string $mentionUcape
     *
     * @return Eleve
     */
    public function setMentionUcape($mentionUcape)
    {
        $this->mentionUcape = $mentionUcape;

        return $this;
    }

    /**
     * Get mentionUcape.
     *
     * @return string
     */
    public function getMentionUcape()
    {
        return $this->mentionUcape;
    }

    /**
     * Set commentairesUcape.
     *
     * @param string $commentairesUcape
     *
     * @return Eleve
     */
    public function setCommentairesUcape($commentairesUcape)
    {
        $this->commentairesUcape = $commentairesUcape;

        return $this;
    }

    /**
     * Get commentairesUcape.
     *
     * @return string
     */
    public function getCommentairesUcape()
    {
        return $this->commentairesUcape;
    }

    /**
     * Set aVoyage.
     *
     * @param bool $aVoyage
     *
     * @return Eleve
     */
    public function setAVoyage($aVoyage)
    {
        $this->aVoyage = $aVoyage;

        return $this;
    }

    /**
     * Get aVoyage.
     *
     * @return bool
     */
    public function getAVoyage()
    {
        return $this->aVoyage;
    }

    /**
     * Set anneeEntreePromo.
     *
     * @param \DateTime $anneeEntreePromo
     *
     * @return Eleve
     */
    public function setAnneeEntreePromo($anneeEntreePromo)
    {
        $this->anneeEntreePromo = $anneeEntreePromo;

        return $this;
    }

    /**
     * Get anneeEntreePromo.
     *
     * @return \DateTime
     */
    public function getAnneeEntreePromo()
    {
        return $this->anneeEntreePromo;
    }

    public function setClasses($classes)
    {
        $this->classes = $classes;

        return $this;
    }
    public function getClasses()
    {
        return $this->classes;
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

    public function setPromotions($promotions)
    {
        $this->promotions = $promotions;

        return $this;
    }
    public function getPromotions()
    {
        return $this->promotions;
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

    public function setProposition($proposition)
    {
        $this->proposition = $proposition;

        return $this;
    }
    public function getProposition()
    {
        return $this->proposition;
    }

    public function setUtilisateurId($utilisateurId)
    {
        $this->utilisateurId = $utilisateurId;

        return $this;
    }
    public function getUtilisateurId()
    {
        return $this->utilisateurId;
    }
}
