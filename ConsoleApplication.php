<?php

/*
 * This file is part of the OsLabSupervisorBundle package.
 *
 * (c) OsLab <https://github.com/OsLab>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OsLab\Console;

use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * ConsoleApplication Class.
 *
 * @author Florent <orions07@gmail.com>
 */
class ConsoleApplication extends Application
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Constructor.
     *
     * @param FileLocatorInterface $fileLocator
     * @param string               $name
     * @param string               $version
     */
    public function __construct(FileLocatorInterface $fileLocator, $name, $version)
    {
        parent::__construct($name, $version);

        // Build Container with services.yml
        $this->container = new ContainerBuilder();
        $loader = new YamlFileLoader($this->container, $fileLocator);
        $loader->load('services.yml');
    }

    /**
     * Get Container.
     *
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
}
