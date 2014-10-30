<?php
/**
 * User.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 07/07/14
 */ 

namespace SG\Bundle\SecurityBundle\Entity;


use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="SG\Bundle\SecurityBundle\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({"administrator" = "User", "user" = "SG\Bundle\ModelBundle\Entity\WebUser"})
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="phone", type="string", nullable=true)
     */
    protected $phone;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId ($id)
    {
        $this->id = $id;

        return $this;
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
        if (!empty($this->name)) {
            return $this->name;
        }

        return $this->getUsername();
    }

    /**
     * @param mixed $phone
     *
     * @return self
     */
    public function setPhone ($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone ()
    {
        return $this->phone;
    }

}
 