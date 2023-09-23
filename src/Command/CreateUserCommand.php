<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Create or update an user',
)]
class CreateUserCommand extends Command
{
    public function __construct(
      private readonly UserPasswordHasherInterface $userPasswordHasher,
      private readonly ManagerRegistry $managerRegistry
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'email of user')
            ->addArgument('password', InputArgument::OPTIONAL, "plain password")
            ->addOption('administrator', 'a', InputOption::VALUE_NONE, 'is user administrator ?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
      try {
        $manager = $this->managerRegistry->getManager();
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');
        if (! $password) {
          $helper = $this->getHelper('question');
          $question = new Question('Please enter a password:');
          $question->setHidden(true);
          $question->setHiddenFallback(true);
          $password = $helper->ask($input, $output, $question);
          if (! $password) {
            $io->error('Password is empty');
            return Command::FAILURE;
          }
        }

        // find if user already exists
        $repo = $manager->getRepository(User::class);
        $user = $repo->findOneBy(['email' => $email]);
        $created = false;
        if (! $user) {
          $user = (new User())
            ->setEmail($email)
          ;
          $created = true;
        }

        if ($input->getOption('administrator')) {
          $user->setRoles(['ROLE_ADMIN']);
        }
        $user->setPassword(
          $this->userPasswordHasher->hashPassword($user, $password)
        );
        $manager->persist($user);
        $manager->flush();
      } catch (\Exception $exception) {
        $io->error('User not created');
        return Command::FAILURE;
      }


      $io->success($created ? 'User created' : 'User updated');
      return Command::SUCCESS;
    }
}
