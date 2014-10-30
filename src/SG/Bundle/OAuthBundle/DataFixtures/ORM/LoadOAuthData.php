<?php
/**
 * LoadOAuthData.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 13/07/14
 */ 

namespace SG\Bundle\OAuthBundle\DoctrineFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\OAuthServerBundle\Entity\AccessTokenManager;
use FOS\OAuthServerBundle\Entity\ClientManager;
use FOS\OAuthServerBundle\Entity\RefreshTokenManager;
use FOS\UserBundle\Entity\UserManager;
use SG\Bundle\OAuthBundle\Entity\AccessToken;
use SG\Bundle\OAuthBundle\Entity\Client;
use SG\Bundle\OAuthBundle\Entity\RefreshToken;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadOAuthData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load (ObjectManager $manager)
    {
        /** @var ClientManager $clientManager */
        $clientManager = $this->container->get('fos_oauth_server.client_manager.default');

        /** @var Client $client */
        $client = $clientManager->createClient();
        $client->setName('Mobile App');
        $client->setRandomId('3u99l2mvtmasgcgcscccw8wksc8kw4g4s0w4cksss0ccogo0ok');
        $client->setAllowedGrantTypes(array(
            'authorization_code',
            'implicit_grant',
            'password',
            'client_credentials',
            'refresh_token',
            'code'
        ));
        $client->setCreatedAt(new \DateTime());
        $client->setSecret('zpk7rcox5yos0wscoogs4g44s0ssgkg4c0kosco0kckgoc888');
        $client->setRedirectUris(array('mobile_incidencias://oauth-response'));
        $clientManager->updateClient($client);

        /** @var AccessTokenManager $accessTokenManager */
        $accessTokenManager = $this->container->get('fos_oauth_server.access_token_manager.default');

        /** @var UserManager $userManager */
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername('usuario');

        /** @var AccessToken $token */
        $token = $accessTokenManager->createToken();
        $token->setToken('ZTcxZjQ1NTg4ZGJmYzc0ZjYxMDA0N2U4N2M3OTg0ZWEzZjlkZjUxMWE2Yjc4M2E0OGZkZmIwZWE4NDc0OGNkNQ');
        $token->setClient($client);
        $token->setScope('user');
        $token->setExpiresAt(time() + 604800);
        $token->setUser($user);
        $accessTokenManager->updateToken($token);

        /** @var RefreshTokenManager $refreshTokenManager */
        $refreshTokenManager = $this->container->get('fos_oauth_server.refresh_token_manager.default');

        /** @var RefreshToken $refreshToken */
        $refreshToken = $refreshTokenManager->createToken();
        $refreshToken->setClient($client);
        $refreshToken->setUser($user);
        $refreshToken->setScope('user');
        $refreshToken->setToken('MjYyMjk1MDk1YjQ2ZmY0NmMzODkyNjEwZDkwMmU1YzE5NDM2ZTlhODc3M2I0MGVlYzZmNTQzY2NjNWE2NjVlNQ');
        $refreshToken->setExpiresAt(time() + 2592000);
        $refreshTokenManager->updateToken($refreshToken);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder ()
    {
        return 2;
    }

}
 