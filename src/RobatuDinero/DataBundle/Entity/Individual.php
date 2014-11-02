<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Individual
 *
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"person" = "Person", "organization" = "Organization"})
 */
abstract class Individual
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
     * @var Accusation[]
     *
     * @ORM\ManyToMany(targetEntity="Accusation", inversedBy="accused")
     * @ORM\JoinTable(name="accused_individual")
     */
    private $accusations;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->accusations = new ArrayCollection();
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
     * @return Individual
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
     * Add accusations
     *
     * @param \RobatuDinero\DataBundle\Entity\Accusation $accusations
     * @return Individual
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
}