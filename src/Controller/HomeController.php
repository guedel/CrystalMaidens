<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/adversaries', name: 'adversaries-request')]
    public function adversaries(): Response
    {
        return $this->render('home/adversaries.html.twig');
    }

    #[Route('/crystals', name: 'crystal-request')]
    public function crystalLoot(): Response
    {
        return $this->render('home/crystals.html.twig');
    }
}
