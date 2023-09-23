<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = (new User())
            ->setEmail('admin@localhost')
            ->setRoles(['ROLE_ADMIN', 'ROLE_ADMIN'])
        ;
        $user->setPassword(            
            $this->userPasswordHasher->hashPassword($user, 'Admin01')
        );
        $manager->persist($user);

        $manager->flush();
    }
}
