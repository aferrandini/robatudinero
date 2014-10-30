<?php
/**
 * Client.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 07/07/14
 */ 

namespace SG\Bundle\OAuthBundle\Entity;


use Gedmo\Mapping\Annotation as Gedmo;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="oauth_client")
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    protected $name;

    public function __construct ()
    {
        parent::__construct();
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName ($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $created_at
     *
     * @return self
     */
    public function setCreatedAt (\DateTime $created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt ()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

}
 