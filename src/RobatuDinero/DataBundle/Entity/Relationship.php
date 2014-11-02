<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relationship
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\RelationshipRepository")
 */
class Relationship
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
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var Relationship
     *
     * @ORM\OneToOne(targetEntity="Relationship")
     * @ORM\JoinColumn(name="inversed", referencedColumnName="id")
     */
    private $inversed;

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
     * Set category
     *
     * @param string $category
     * @return Relationship
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Relationship
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set inversed
     *
     * @param \RobatuDinero\DataBundle\Entity\Relationship $inversed
     * @return Relationship
     */
    public function setInversed(\RobatuDinero\DataBundle\Entity\Relationship $inversed = null)
    {
        $this->inversed = $inversed;
    
        return $this;
    }

    /**
     * Get inversed
     *
     * @return \RobatuDinero\DataBundle\Entity\Relationship 
     */
    public function getInversed()
    {
        return $this->inversed;
    }
}