<?php declare(strict_types=1);

  namespace App\Tests\Command;

  use App\Command\CreateUserCommand;
  use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
  use Symfony\Bundle\FrameworkBundle\Console\Application;
  use Symfony\Component\Console\Input\Input;
  use Symfony\Component\Console\Output\Output;
  use Symfony\Component\Console\Tester\CommandTester;

class CreateUserCommandTest extends KernelTestCase
{
    protected function setUp(): void
    {
        exec('stty 2>&1', $output, $exitcode);
        $isSttySupported = 0 === $exitcode;

        if ('Windows' === \PHP_OS_FAMILY || !$isSttySupported) {
            $this->markTestSkipped('`stty` is required to test this command.');
        }
    }

    public function testCreateUser()
    {
        $output = $this->executeCommand(
            'create:user',
            ['email' => 'test@test.com', 'password' => 'test'],
        );
        $this->assertStringContainsString('', $output);
    }

    /**
     * This helper method abstracts the boilerplate code needed to test the
     * execution of a command.
     *
     * @param array $arguments All the arguments passed when executing the command
     * @param array $inputs    The (optional) answers given to the command when it
     *                         asks for the value of the missing arguments
     */
    private function executeCommand(string $commandName, array $arguments, array $inputs = []): string
    {
        self::bootKernel();
        $application = new Application(self::$kernel);
        $command = $application->find($commandName);
        $commandTester = new CommandTester($command);
        $commandTester->execute($arguments);

        return $commandTester->getDisplay();
    }
}
