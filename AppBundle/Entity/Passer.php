<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passer
 *
 * @ORM\Table(name="passer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PasserRepository")
 */
class Passer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_passer", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_passer", type="date")
     */
    private $datePasser;

    /**
     * @var float
     *
     * @ORM\Column(name="note_passer", type="float")
     */
    private $notePasser;

    /**
     * @var string
     *
     * @ORM\Column(name="appreciation_passer", type="text")
     */
    private $appreciationPasser;

    /**
     * @ORM\ManyToOne(targetEntity="Langue", inversedBy="passer")
     * @ORM\JoinColumn(name="Eid_langue_passer", referencedColumnName="id_langue")
    */
    private $langues;

    /**
     * @ORM\ManyToOne(targetEntity="Examinateur", inversedBy="passer")
     * @ORM\JoinColumn(name="Eid_examinateur_passer", referencedColumnName="id_examinateur")
    */
    private $examinateurs;

    /**
     * @ORM\ManyToOne(targetEntity="Eleve", inversedBy="passer")
     * @ORM\JoinColumn(name="Eid_eleve_passer", referencedColumnName="id_eleve")
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
     * Set datePasser.
     *
     * @param \DateTime $datePasser
     *
     * @return Passer
     */
    public function setDatePasser($datePasser)
    {
        $this->datePasser = $datePasser;

        return $this;
    }

    /**
     * Get datePasser.
     *
     * @return \DateTime
     */
    public function getDatePasser()
    {
        return $this->datePasser;
    }

    /**
     * Set notePasser.
     *
     * @param float $notePasser
     *
     * @return Passer
     */
    public function setNotePasser($notePasser)
    {
        $this->notePasser = $notePasser;

        return $this;
    }

    /**
     * Get notePasser.
     *
     * @return float
     */
    public function getNotePasser()
    {
        return $this->notePasser;
    }

    /**
     * Set appreciationPasser.
     *
     * @param string $appreciationPasser
     *
     * @return Passer
     */
    public function setAppreciationPasser($appreciationPasser)
    {
        $this->appreciationPasser = $appreciationPasser;

        return $this;
    }

    /**
     * Get appreciationPasser.
     *
     * @return string
     */
    public function getAppreciationPasser()
    {
        return $this->appreciationPasser;
    }

    public function setExaminateurs($examinateurs)
    {
        $this->examinateurs = $examinateurs;

        return $this;
    }
    public function getExaminateurs()
    {
        return $this->examinateurs;
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

    public function setEleves($eleves)
    {
        $this->eleves = $eleves;

        return $this;
    }
    public function getEleves()
    {
        return $this->eleves;
    }
}
