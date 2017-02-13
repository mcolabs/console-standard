<?php
namespace OsLab\Console\Command;

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
        foreach ($this->getContainer()->getServiceIds() as $serviceId) {
            $output->writeln($serviceId);
        }
    }
}
