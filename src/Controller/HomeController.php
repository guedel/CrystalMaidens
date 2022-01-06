<?php

namespace App\Controller;

use App\Repository\EtapeAdversaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function adversaries(Request $request, EtapeAdversaireRepository $repo): Response
    {
        // $offset = max(0, $request->query->getInt('offset', 0));
        // $adv = $repo->getAdversaries($offset);
        $adv = $repo->getAdversaries();
        return $this->render('home/adversaries.html.twig', [
            'adversaries' => $adv,
            // 'previous' => $offset - EtapeAdversaireRepository::PAGINATOR_PER_PAGE,
            // 'next' => min(count($adv), $offset + EtapeAdversaireRepository::PAGINATOR_PER_PAGE),
        ]);
    }

    #[Route('/crystals', name: 'crystal-request')]
    public function crystalLoot(): Response
    {
        return $this->render('home/crystals.html.twig');
    }
}
