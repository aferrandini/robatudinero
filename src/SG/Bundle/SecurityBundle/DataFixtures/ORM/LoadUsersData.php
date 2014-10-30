<?php
/**
 * LoadUsersData.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 13/07/14
 */ 

namespace SG\Bundle\SecurityBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Doctrine\UserManager;
use SG\Bundle\ModelBundle\Entity\WebUser;
use SG\Bundle\SecurityBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadUsersData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load (ObjectManager $manager)
    {
        /** @var UserManager $userManager */
        $userManager = $this->container->get('fos_user.user_manager');

        /** @var User $user */
        $user = $userManager->createUser();
        $user
            ->setName('Usuario')
            ->setUsername('usuario')
            ->setEmail('usuario@symfony.guru')
            ->setPlainPassword('1234')
            ->setEnabled(true);
        $userManager->updateUser($user);

        $user = new WebUser();
        $user
            ->setName('Admin')
            ->setUsername('admin')
            ->setEmail('admin@symfony.guru')
            ->setPlainPassword('1234')
            ->setSuperAdmin(true)
            ->setEnabled(true);
        $userManager->updateUser($user);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder ()
    {
        return 1;
    }

}
 