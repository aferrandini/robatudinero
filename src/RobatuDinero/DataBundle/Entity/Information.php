<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Information
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Information
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
     * @ORM\ManyToOne(targetEntity="Incident", inversedBy="informations")
     * @ORM\JoinColumn(name="incident_id", referencedColumnName="id")
     */
    private $incident;

    /**
     * @var Source
     *
     * @ORM\ManyToOne(targetEntity="Source", inversedBy="informations")
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     */
    private $source;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publication", type="date")
     */
    private $publication;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

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
     * Set publication
     *
     * @param \DateTime $publication
     * @return Information
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;
    
        return $this;
    }

    /**
     * Get publication
     *
     * @return \DateTime 
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Information
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    
        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set incident
     *
     * @param \RobatuDinero\DataBundle\Entity\Incident $incident
     * @return Information
     */
    public function setIncident(\RobatuDinero\DataBundle\Entity\Incident $incident = null)
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
     * Set source
     *
     * @param \RobatuDinero\DataBundle\Entity\Source $source
     * @return Information
     */
    public function setSource(\RobatuDinero\DataBundle\Entity\Source $source = null)
    {
        $this->source = $source;
    
        return $this;
    }

    /**
     * Get source
     *
     * @return \RobatuDinero\DataBundle\Entity\Source 
     */
    public function getSource()
    {
        return $this->source;
    }
}