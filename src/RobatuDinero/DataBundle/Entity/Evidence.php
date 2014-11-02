<?php

namespace RobatuDinero\DataBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evidence
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\EvidenceRepository")
 */
class Evidence
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
     * @var Accusation
     *
     * @ORM\ManyToOne(targetEntity="Accusation", inversedBy="evidences")
     * @ORM\JoinColumn(name="evidence_id", referencedColumnName="id", nullable=false)
     */
    private $accusation;

    /**
     * @var Wealth[]
     *
     * @ORM\OneToMany(targetEntity="Wealth", mappedBy="evidence")
     */
    private $wealth;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

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
        $this->wealth = new ArrayCollection();
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
     * @return Evidence
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
     * Set description
     *
     * @param string $description
     * @return Evidence
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set published
     *
     * @param \DateTime $published
     * @return Evidence
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
     * Set accusation
     *
     * @param \RobatuDinero\DataBundle\Entity\Accusation $accusation
     * @return Evidence
     */
    public function setAccusation(\RobatuDinero\DataBundle\Entity\Accusation $accusation)
    {
        $this->accusation = $accusation;
    
        return $this;
    }

    /**
     * Get accusation
     *
     * @return \RobatuDinero\DataBundle\Entity\Accusation 
     */
    public function getAccusation()
    {
        return $this->accusation;
    }

    /**
     * Add wealth
     *
     * @param \RobatuDinero\DataBundle\Entity\Wealth $wealth
     * @return Evidence
     */
    public function addWealth(\RobatuDinero\DataBundle\Entity\Wealth $wealth)
    {
        $this->wealth[] = $wealth;
    
        return $this;
    }

    /**
     * Remove wealth
     *
     * @param \RobatuDinero\DataBundle\Entity\Wealth $wealth
     */
    public function removeWealth(\RobatuDinero\DataBundle\Entity\Wealth $wealth)
    {
        $this->wealth->removeElement($wealth);
    }

    /**
     * Get wealth
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWealth()
    {
        return $this->wealth;
    }
}