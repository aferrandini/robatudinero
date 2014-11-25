<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bind
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\BindRepository")
 */
class Bind
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
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="binds")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=false)
     */
    private $person;

    /**
     * @var Person
     *
     * @ORM\OneToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="bind_id", referencedColumnName="id", nullable=false)
     */
    private $bind;

    /**
     * @var Relationship
     *
     * @ORM\OneToOne(targetEntity="Relationship")
     * @ORM\JoinColumn(name="relationship_id", referencedColumnName="id", nullable=false)
     */
    private $relationship;

    /**
     * @var Organization
     *
     * @ORM\OneToOne(targetEntity="Organization")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     */
    private $organization;


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
     * Set person
     *
     * @param \RobatuDinero\DataBundle\Entity\Person $person
     * @return Bind
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

    /**
     * Set bind
     *
     * @param \RobatuDinero\DataBundle\Entity\Person $bind
     * @return Bind
     */
    public function setBind(\RobatuDinero\DataBundle\Entity\Person $bind)
    {
        $this->bind = $bind;
    
        return $this;
    }

    /**
     * Get bind
     *
     * @return \RobatuDinero\DataBundle\Entity\Person 
     */
    public function getBind()
    {
        return $this->bind;
    }

    /**
     * Set relationship
     *
     * @param \RobatuDinero\DataBundle\Entity\Relationship $relationship
     * @return Bind
     */
    public function setRelationship(\RobatuDinero\DataBundle\Entity\Relationship $relationship)
    {
        $this->relationship = $relationship;
    
        return $this;
    }

    /**
     * Get relationship
     *
     * @return \RobatuDinero\DataBundle\Entity\Relationship 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set organization
     *
     * @param \RobatuDinero\DataBundle\Entity\Organization $organization
     * @return Bind
     */
    public function setOrganization(\RobatuDinero\DataBundle\Entity\Organization $organization = null)
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
}