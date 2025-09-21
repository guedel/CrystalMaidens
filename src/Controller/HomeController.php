<?php declare(strict_types=1);

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
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homeNoLocale')]
    public function indexNoLocale(): Response
    {
        return $this->redirectToRoute('homepage', ['_locale' => 'en']);
    }

    #[Route('/{_locale<%app.supported_locales%>}/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('{_locale<%app.supported_locales%>}/adversaries', name: 'adversaries-request')]
    public function adversaries(Request $request, EtapeAdversaireRepository $repo): Response
    {
        $adv = $repo->getAdversaries();
        return $this->render('home/adversaries.html.twig', [
            'adversaries' => $adv,
        ]);
    }

    #[Route('{_locale<%app.supported_locales%>}/crystals', name: 'crystal-request')]
    public function crystalLoot(EtapeCrystalRepository $repo): Response
    {
        $crystals = $repo->getCrystals();
        return $this->render('home/crystals.html.twig', [
            'crystals' => $crystals,
        ]);
    }

    #[Route('{_locale<%app.supported_locales%>}/shards', name:'shard-request')]
    public function shards(EtapeFragmentRepository $repo): Response
    {
        $shards = $repo->getShards();
        return $this->render('home/shards.html.twig', [
            'shards' => $shards,
        ]);
    }

    #[Route('{_locale<%app.supported_locales%>}/stages', name:'stages-request')]
    public function stages(EtapeRepository $repo): Response
    {
        $stages = $repo->getStages();
        return $this->render('home/stages.html.twig', [
            'stages' => $stages,
        ]);
    }
}
