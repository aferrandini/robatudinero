<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Person
 *
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_person_slug", columns={"slug"})})
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\PersonRepository")
 */
class Person extends Individual
{
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text")
     */
    private $biography;

    /**
     * @var Bind[]
     *
     * @ORM\OneToMany(targetEntity="Bind", mappedBy="bind")
     */
    private $binds;

    /**
     * @var PersonPosition[]
     *
     * @ORM\OneToMany(targetEntity="PersonPosition", mappedBy="person")
     */
    private $positions;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->binds = new ArrayCollection();
        $this->positions = new ArrayCollection();
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Person
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
     * Set biography
     *
     * @param string $biography
     * @return Person
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    
        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Add binds
     *
     * @param \RobatuDinero\DataBundle\Entity\Bind $binds
     * @return Person
     */
    public function addBind(\RobatuDinero\DataBundle\Entity\Bind $binds)
    {
        $this->binds[] = $binds;
    
        return $this;
    }

    /**
     * Remove binds
     *
     * @param \RobatuDinero\DataBundle\Entity\Bind $binds
     */
    public function removeBind(\RobatuDinero\DataBundle\Entity\Bind $binds)
    {
        $this->binds->removeElement($binds);
    }

    /**
     * Get binds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBinds()
    {
        return $this->binds;
    }

    /**
     * Add positions
     *
     * @param \RobatuDinero\DataBundle\Entity\Position $positions
     * @return Person
     */
    public function addPosition(\RobatuDinero\DataBundle\Entity\Position $positions)
    {
        $this->positions[] = $positions;
    
        return $this;
    }

    /**
     * Remove positions
     *
     * @param \RobatuDinero\DataBundle\Entity\Position $positions
     */
    public function removePosition(\RobatuDinero\DataBundle\Entity\Position $positions)
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