<?php

namespace RobatuDinero\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wealth
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RobatuDinero\DataBundle\Entity\WealthRepository")
 */
class Wealth
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
     * @var WealthType
     *
     * @ORM\OneToOne(targetEntity="WealthType")
     * @ORM\JoinColumn(name="whealth_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal")
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var Evidence
     *
     * @ORM\ManyToOne(targetEntity="Evidence", inversedBy="whealth")
     * @ORM\JoinColumn(name="evidence_id", referencedColumnName="id", nullable=false)
     */
    private $evidence;

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
     * Set value
     *
     * @param string $value
     * @return Wealth
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Wealth
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set type
     *
     * @param \RobatuDinero\DataBundle\Entity\WealthType $type
     * @return Wealth
     */
    public function setType(\RobatuDinero\DataBundle\Entity\WealthType $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \RobatuDinero\DataBundle\Entity\WealthType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set evidence
     *
     * @param \RobatuDinero\DataBundle\Entity\Evidence $evidence
     * @return Wealth
     */
    public function setEvidence(\RobatuDinero\DataBundle\Entity\Evidence $evidence)
    {
        $this->evidence = $evidence;
    
        return $this;
    }

    /**
     * Get evidence
     *
     * @return \RobatuDinero\DataBundle\Entity\Evidence 
     */
    public function getEvidence()
    {
        return $this->evidence;
    }
}