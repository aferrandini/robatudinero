<?php
/**
 * AbstractContainerAwareMigration.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 11/09/14
 */

namespace SG\Doctrine\Migrations;


use Doctrine\DBAL\Migrations\AbstractMigration;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractContainerAwareMigration extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer (ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer ()
    {
        return $this->container;
    }
}
 