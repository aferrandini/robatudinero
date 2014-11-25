<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Incident
 *
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_incident_slug", columns={"slug"})})
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\IncidentRepository")
 */
class Incident
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

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
     * @var Information[]
     *
     * @ORM\OneToMany(targetEntity="Information", mappedBy="incident")
     */
    private $informations;

    /**
     * @var Accusation[]
     *
     * @ORM\OneToMany(targetEntity="Accusation", mappedBy="incident")
     */
    private $accusations;

    /**
     * @var Investigation[]
     *
     * @ORM\OneToMany(targetEntity="Investigation", mappedBy="incident")
     */
    private $investigations;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->informations = new ArrayCollection();
        $this->accusations = new ArrayCollection();
        $this->investigations = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Incident
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Incident
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Incident
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
     * @return Incident
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
     * Add informations
     *
     * @param \RobatuDinero\DataBundle\Entity\Information $informations
     * @return Incident
     */
    public function addInformation(\RobatuDinero\DataBundle\Entity\Information $informations)
    {
        $this->informations[] = $informations;
    
        return $this;
    }

    /**
     * Remove informations
     *
     * @param \RobatuDinero\DataBundle\Entity\Information $informations
     */
    public function removeInformation(\RobatuDinero\DataBundle\Entity\Information $informations)
    {
        $this->informations->removeElement($informations);
    }

    /**
     * Get informations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * Add accusations
     *
     * @param \RobatuDinero\DataBundle\Entity\Accusation $accusations
     * @return Incident
     */
    public function addAccusation(\RobatuDinero\DataBundle\Entity\Accusation $accusations)
    {
        $this->accusations[] = $accusations;
    
        return $this;
    }

    /**
     * Remove accusations
     *
     * @param \RobatuDinero\DataBundle\Entity\Accusation $accusations
     */
    public function removeAccusation(\RobatuDinero\DataBundle\Entity\Accusation $accusations)
    {
        $this->accusations->removeElement($accusations);
    }

    /**
     * Get accusations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccusations()
    {
        return $this->accusations;
    }

    /**
     * Add investigations
     *
     * @param \RobatuDinero\DataBundle\Entity\Investigation $investigations
     * @return Incident
     */
    public function addInvestigation(\RobatuDinero\DataBundle\Entity\Investigation $investigations)
    {
        $this->investigations[] = $investigations;
    
        return $this;
    }

    /**
     * Remove investigations
     *
     * @param \RobatuDinero\DataBundle\Entity\Investigation $investigations
     */
    public function removeInvestigation(\RobatuDinero\DataBundle\Entity\Investigation $investigations)
    {
        $this->investigations->removeElement($investigations);
    }

    /**
     * Get investigations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvestigations()
    {
        return $this->investigations;
    }
}