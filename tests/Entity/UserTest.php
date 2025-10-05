<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    use PrivateAttributeAccess;

    public static function buildUser(int $id, string $email, string $password, array $roles = []): User
    {
        $user = (new User())
            ->setEmail($email)
            ->setPassword($password)
            ->setRoles($roles)
        ;
        self::setPrivateAttribute($user, 'id', $id);
        return $user;
    }

    public function testUser(): void
    {
        $id = 5;
        $email = 'test@localhost';
        $password = 'password';
        $roles = ['ROLE_USER'];
        $user = self::buildUser($id, $email, $password, $roles);
        $user->eraseCredentials();
        $user->setIsVerified(true);
        self::assertInstanceOf(User::class, $user);
        $this->assertEquals($id, $user->getId());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($user->getEmail(), $user->getUserIdentifier());
        $this->assertEquals($password, $user->getPassword());
        $this->assertEquals($roles, $user->getRoles());
        $this->assertTrue($user->isVerified());
        $this->assertNull($user->getSalt());
    }
}
