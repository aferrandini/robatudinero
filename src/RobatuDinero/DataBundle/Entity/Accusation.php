<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Accusation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\AccusationRepository")
 */
class Accusation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Incident
     *
     * @ORM\ManyToOne(targetEntity="Incident", inversedBy="accusations")
     * @ORM\JoinColumn(name="incident_id", referencedColumnName="id", nullable=false)
     */
    private $incident;

    /**
     * @var Individual[]
     *
     * @ORM\ManyToMany(targetEntity="Individual", mappedBy="accusations")
     */
    private $accused;

    /**
     * @var Grade
     *
     * @ORM\OneToOne(targetEntity="Grade")
     * @ORM\JoinColumn(name="grade_id", referencedColumnName="id", nullable=false)
     */
    private $grade;

    /**
     * @var Evidence[]
     *
     * @ORM\OneToMany(targetEntity="Evidence", mappedBy="accusation")
     */
    private $evidences;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published", type="date")
     */
    private $published;


    /**
     * Construct
     */
    public function __construct()
    {
        $this->accused = new ArrayCollection();
        $this->evidences = new ArrayCollection();
    }

    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set published
     *
     * @param \DateTime $published
     * @return Accusation
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return \DateTime 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set incident
     *
     * @param \RobatuDinero\DataBundle\Entity\Incident $incident
     * @return Accusation
     */
    public function setIncident(\RobatuDinero\DataBundle\Entity\Incident $incident)
    {
        $this->incident = $incident;
    
        return $this;
    }

    /**
     * Get incident
     *
     * @return \RobatuDinero\DataBundle\Entity\Incident 
     */
    public function getIncident()
    {
        return $this->incident;
    }

    /**
     * Add accused
     *
     * @param \RobatuDinero\DataBundle\Entity\Individual $accused
     * @return Accusation
     */
    public function addAccused(\RobatuDinero\DataBundle\Entity\Individual $accused)
    {
        $this->accused[] = $accused;
    
        return $this;
    }

    /**
     * Remove accused
     *
     * @param \RobatuDinero\DataBundle\Entity\Individual $accused
     */
    public function removeAccused(\RobatuDinero\DataBundle\Entity\Individual $accused)
    {
        $this->accused->removeElement($accused);
    }

    /**
     * Get accused
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccused()
    {
        return $this->accused;
    }

    /**
     * Set grade
     *
     * @param \RobatuDinero\DataBundle\Entity\Grade $grade
     * @return Accusation
     */
    public function setGrade(\RobatuDinero\DataBundle\Entity\Grade $grade)
    {
        $this->grade = $grade;
    
        return $this;
    }

    /**
     * Get grade
     *
     * @return \RobatuDinero\DataBundle\Entity\Grade 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Add evidences
     *
     * @param \RobatuDinero\DataBundle\Entity\Evidence $evidences
     * @return Accusation
     */
    public function addEvidence(\RobatuDinero\DataBundle\Entity\Evidence $evidences)
    {
        $this->evidences[] = $evidences;
    
        return $this;
    }

    /**
     * Remove evidences
     *
     * @param \RobatuDinero\DataBundle\Entity\Evidence $evidences
     */
    public function removeEvidence(\RobatuDinero\DataBundle\Entity\Evidence $evidences)
    {
        $this->evidences->removeElement($evidences);
    }

    /**
     * Get evidences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvidences()
    {
        return $this->evidences;
    }
}