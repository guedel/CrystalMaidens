<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    #[Route('{_locale<%app.supported_locales%>}/error', name: 'app_error_with_locale')]
    public function show(\Throwable $exception, DebugLoggerInterface $logger): Response
    {
        return $this->render('error/show.html.twig', [
            'exception' => $exception,
            'logger' => $logger,

        ]);
    }

  #[Route('error', name: 'app_error')]
  public function index(\Throwable $exception, DebugLoggerInterface $logger): Response
  {
    return $this->render('error/show.html.twig', [
      'exception' => $exception,
      'logger' => $logger,
    ]);
  }

}
