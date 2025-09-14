<?php declare(strict_types=1);

  namespace App\Tests\Controller;

  use App\Controller\SecurityController;
  use PHPUnit\Framework\Attributes\DataProvider;
  use Symfony\Bundle\FrameworkBundle\KernelBrowser;
  use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
  use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
    }

    public function testGetLogin()
    {
        $this->client->request('GET', '/en/login');
        static::assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    /**
     * @return void
     */
    #[DataProvider('getBadCredentials')]
    public function testBadCredentials($email, $password)
    {
        $this->client->request('POST', '/en/login', ['email' => $email, 'password' => $password]);
        static::assertResponseRedirects('/en/login');
    }

    public static function getBadCredentials(): iterable
    {
        return [
        ['john', 'john'],
        ['', 'john'],
        ['john', ''],
        ];
    }
}
