<?php
/**
 * AuthCode.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 07/07/14
 */ 

namespace SG\Bundle\OAuthBundle\Entity;


use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="oauth_auth_code")
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="SG\Bundle\SecurityBundle\Entity\User")
     */
    protected $user;
}
 