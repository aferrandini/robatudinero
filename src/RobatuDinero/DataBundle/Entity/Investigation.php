<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Investigation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\InvestigationRepository")
 */
class Investigation
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
     * @ORM\ManyToOne(targetEntity="Incident", inversedBy="investigations")
     * @ORM\JoinColumn(name="incident_id", referencedColumnName="id", nullable=false)
     */
    private $incident;

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="investigations")
     * @ORM\JoinColumn(name="judge_id", referencedColumnName="id", nullable=false)
     */
    private $judge;

    /**
     * @var Organization
     *
     * @ORM\ManyToOne(targetEntity="Organization", inversedBy="investigations")
     * @ORM\JoinColumn(name="court_id", referencedColumnName="id", nullable=false)
     */
    private $court;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date")
     */
    private $endDate;

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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Investigation
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Investigation
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set incident
     *
     * @param \RobatuDinero\DataBundle\Entity\Incident $incident
     * @return Investigation
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
     * Set judge
     *
     * @param \RobatuDinero\DataBundle\Entity\Person $judge
     * @return Investigation
     */
    public function setJudge(\RobatuDinero\DataBundle\Entity\Person $judge)
    {
        $this->judge = $judge;
    
        return $this;
    }

    /**
     * Get judge
     *
     * @return \RobatuDinero\DataBundle\Entity\Person 
     */
    public function getJudge()
    {
        return $this->judge;
    }

    /**
     * Set court
     *
     * @param \RobatuDinero\DataBundle\Entity\Organization $court
     * @return Investigation
     */
    public function setCourt(\RobatuDinero\DataBundle\Entity\Organization $court)
    {
        $this->court = $court;
    
        return $this;
    }

    /**
     * Get court
     *
     * @return \RobatuDinero\DataBundle\Entity\Organization 
     */
    public function getCourt()
    {
        return $this->court;
    }
}