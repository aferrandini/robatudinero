<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonPosition
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class PersonPosition
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
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="positions")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=false)
     */
    private $person;

    /**
     * @var Organization
     *
     * @ORM\ManyToOne(targetEntity="Organization", inversedBy="positions")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id", nullable=false)
     */
    private $organization;

    /**
     * @var Position
     *
     * @ORM\OneToOne(targetEntity="Position")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id", nullable=false)
     */
    private $position;

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
     * @return IndividualPosition
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
     * @return IndividualPosition
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
     * Set individual
     *
     * @param \RobatuDinero\DataBundle\Entity\Individual $individual
     * @return IndividualPosition
     */
    public function setIndividual(\RobatuDinero\DataBundle\Entity\Individual $individual)
    {
        $this->individual = $individual;
    
        return $this;
    }

    /**
     * Get individual
     *
     * @return \RobatuDinero\DataBundle\Entity\Individual 
     */
    public function getIndividual()
    {
        return $this->individual;
    }

    /**
     * Set organization
     *
     * @param \RobatuDinero\DataBundle\Entity\Organization $organization
     * @return IndividualPosition
     */
    public function setOrganization(\RobatuDinero\DataBundle\Entity\Organization $organization)
    {
        $this->organization = $organization;
    
        return $this;
    }

    /**
     * Get organization
     *
     * @return \RobatuDinero\DataBundle\Entity\Organization 
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set position
     *
     * @param \RobatuDinero\DataBundle\Entity\Position $position
     * @return IndividualPosition
     */
    public function setPosition(\RobatuDinero\DataBundle\Entity\Position $position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return \RobatuDinero\DataBundle\Entity\Position 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set person
     *
     * @param \RobatuDinero\DataBundle\Entity\Person $person
     * @return PersonPosition
     */
    public function setPerson(\RobatuDinero\DataBundle\Entity\Person $person)
    {
        $this->person = $person;
    
        return $this;
    }

    /**
     * Get person
     *
     * @return \RobatuDinero\DataBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
}