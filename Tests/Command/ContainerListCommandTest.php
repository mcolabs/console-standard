<?php

/*
 * This file is part of the OsLabSupervisorBundle package.
 *
 * (c) OsLab <https://github.com/OsLab>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Command;

use Symfony\Component\Console\Tester\CommandTester;
use OsLab\Console\ConsoleApplication;
use OsLab\Console\Command\ContainerListCommand;

/**
 * Class ContainerListCommandTest.
 *
 * @author Florent <orions07@gmail.com>
 */
class ContainerListCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldExecute()
    {
        $application = new ConsoleApplication("test", "1.0.0");
        $application->add(new ContainerListCommand());

        $command = $application->find('container:list');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command' => $command->getName(),
        ]);
    }
}
