<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Organization
 *
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_organization_slug", columns={"slug"})})
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\OrganizationRepository")
 */
class Organization extends Individual
{
    /**
     * @var OrganizationType
     *
     * @ORM\OneToOne(targetEntity="OrganizationType")
     * @ORM\JoinColumn(name="organization_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * Investigations as court
     * @var Investigation[]
     *
     * @ORM\OneToMany(targetEntity="Investigation", mappedBy="investigations")
     */
    private $investigations;

    /**
     * @var PersonPosition[]
     *
     * @ORM\OneToMany(targetEntity="PersonPosition", mappedBy="organization")
     */
    private $positions;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->investigations = new ArrayCollection();
        $this->positions = new ArrayCollection();
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Organization
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
     * Set type
     *
     * @param \RobatuDinero\DataBundle\Entity\OrganizationType $type
     * @return Organization
     */
    public function setType(\RobatuDinero\DataBundle\Entity\OrganizationType $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \RobatuDinero\DataBundle\Entity\OrganizationType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add investigations
     *
     * @param \RobatuDinero\DataBundle\Entity\Investigation $investigations
     * @return Organization
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

    /**
     * Add positions
     *
     * @param \RobatuDinero\DataBundle\Entity\PersonPosition $positions
     * @return Organization
     */
    public function addPosition(\RobatuDinero\DataBundle\Entity\PersonPosition $positions)
    {
        $this->positions[] = $positions;
    
        return $this;
    }

    /**
     * Remove positions
     *
     * @param \RobatuDinero\DataBundle\Entity\PersonPosition $positions
     */
    public function removePosition(\RobatuDinero\DataBundle\Entity\PersonPosition $positions)
    {
        $this->positions->removeElement($positions);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPositions()
    {
        return $this->positions;
    }
}