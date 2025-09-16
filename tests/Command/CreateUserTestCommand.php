<?php declare(strict_types=1);

  namespace App\Tests\Command;

  use App\Command\CreateUserCommand;
  use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
  use Symfony\Bundle\FrameworkBundle\Console\Application;
  use Symfony\Component\Console\Input\Input;
  use Symfony\Component\Console\Output\Output;
  use Symfony\Component\Console\Tester\CommandTester;

class CreateUserTestCommand extends BaseTestCommand
{
    public function testCreateUser(): void
    {
        $output = $this->executeCommand(
            'app:create-user',
            ['email' => 'test@test.com', 'password' => 'test'],
        );
        $this->assertStringContainsString('User created', $output);
    }
}
