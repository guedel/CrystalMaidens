<?php declare(strict_types=1);

  namespace App\Tests\Controller;

  use App\Controller\HomeController;
  use PHPUnit\Framework\Attributes\DataProvider;
  use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
  use Symfony\Component\HttpFoundation\Response;

  class HomeControllerTest extends WebTestCase
  {

    public function testIndexNoLocale()
    {
      $client = static::createClient();
      $client->request('GET', '/');
      $this->assertResponseRedirects(
        '/en/',
        Response::HTTP_FOUND,
        "The Url redirects to default language"
      );
    }

    public function testRouteNotFound()
    {
      
      $client = static::createClient();
      $client->request('GET', '/foo');
      $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
    }

    public function testBrowseToProtect()
    {
      $client = static::createClient();
      $client->request('GET', '/en/admin');
      $this->assertResponseRedirects(
        '/en/login',
        Response::HTTP_FOUND,
        "The Url redirects to login page"
      );
    }

    /**
     * @param string $url
     * @return void
     */
    #[DataProvider('getHomeRoutes')]
    public function testRoutes(string $url)
    {
      $client = static::createClient();
      $client->request('GET', $url);
      $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public static function getHomeRoutes(): iterable
    {
      return [
        ['/en/adversaries'],
        ['/en/crystals'],
        ['/en/shards'],
        ['/en/stages'],
      ] ;
    }
  }
