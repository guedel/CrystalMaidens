<?php

  namespace App\Tests\Controller;

  use App\Controller\HomeController;
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
  }
