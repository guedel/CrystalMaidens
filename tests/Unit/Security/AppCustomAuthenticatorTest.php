<?php declare(strict_types=1);

namespace Security;

use App\Security\AppCustomAuthenticator;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\TestBrowserToken;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class AppCustomAuthenticatorTest extends TestCase
{
    private AppCustomAuthenticator $sut;
    private UrlGeneratorInterface   $urlGenerator;

    protected function setUp(): void
    {
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->sut = new AppCustomAuthenticator($this->urlGenerator);
    }

    public function testAuthenticate(): void
    {
        $session = new Session();
        $request = new Request(request:["email" => "toto@test.com"]);
        $request->setSession($session);
        $response = $this->sut->authenticate($request);
        $this->assertInstanceOf(Passport::class, $response);

    }
}
