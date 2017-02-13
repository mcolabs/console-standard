<?php

/*
 * This file is part of the OsLabSupervisorBundle package.
 *
 * (c) OsLab <https://github.com/OsLab>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OsLab\Console\Command;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ContainerListCommand.
 *
 * @author Florent <orions07@gmail.com>
 */
class ContainerListCommand extends AbstractContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('container:list')
            ->setDescription('Displays available services for an application.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new Table($output);
        $table->setHeaders(['Service ID']);

        foreach ($this->getContainer()->getServiceIds() as $serviceId) {
            $table->addRow([$serviceId]);
        }

        $table->render();
    }
}
