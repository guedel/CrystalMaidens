<?php declare(strict_types=1);

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

/**
 *
 */
abstract class BaseTestCommand extends KernelTestCase
{
    /**
     * This helper method abstracts the boilerplate code needed to test the
     * execution of a command.
     *
     * @param string $commandName
     * @param array<mixed, string> $arguments All the arguments passed when executing the command
     */
    protected function executeCommand(string $commandName, array $arguments): string
    {
        self::bootKernel();
        $application = new Application(self::$kernel);
        $command = $application->find($commandName);
        $commandTester = new CommandTester($command);
        $commandTester->execute($arguments);

        return $commandTester->getDisplay();
    }
}
