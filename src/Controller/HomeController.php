<?php

namespace App\Controller;

use App\Repository\{
    EtapeAdversaireRepository,
    EtapeCrystalRepository,
    EtapeFragmentRepository,
    EtapeRepository
};
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
        $adv = $repo->getAdversaries();
        return $this->render('home/adversaries.html.twig', [
            'adversaries' => $adv,
        ]);
    }

    #[Route('/crystals', name: 'crystal-request')]
    public function crystalLoot(EtapeCrystalRepository $repo): Response
    {
        $crystals = $repo->getCrystals();
        return $this->render('home/crystals.html.twig', [
            'crystals' => $crystals,
        ]);
    }

    #[Route('/shards', name:'shard-request')]
    public function shards(EtapeFragmentRepository $repo): Response
    {
        $shards = $repo->getShards();
        return $this->render('home/shards.html.twig', [
            'shards' => $shards,
        ]);
    }

    #[Route('/stages', name:'stages-request')]
    public function stages(EtapeRepository $repo): Response
    {
        $stages = $repo->getStages();
        return $this->render('home/stages.html.twig', [
            'stages' => $stages,
        ]);
    }
}
