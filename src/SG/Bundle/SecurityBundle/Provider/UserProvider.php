<?php
/**
 * UserProvider.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 07/07/14
 */ 

namespace SG\Bundle\SecurityBundle\Provider;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $userRepository;

    public function __construct (ObjectRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $username
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     * @throws UsernameNotFoundException
     */
    public function loadUserByUsername ($username)
    {
        $q = $this->userRepository
            ->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery();

        try {
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                'Unable to find an active user identified by "%s".',
                $username
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $user;
    }

    /**
     * @param UserInterface $user
     *
     * @return object|\Symfony\Component\Security\Core\User\UserInterface
     * @throws UnsupportedUserException
     */
    public function refreshUser (UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }

        return $this->userRepository->find($user->getId());
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass ($class)
    {
        return $this->userRepository->getClassName() === $class
               || is_subclass_of($class, $this->userRepository->getClassName());
    }
}
 