<?php

namespace App\DataFixtures;

use App\Entity\{Campagne, Etape};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

class CampaignFixtures extends Fixture
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function load(ObjectManager $manager): void
    {
        $campaigns = [];
        for ($c = 1; $c <= 6; $c++) {
            $campagne = $manager->getRepository(Campagne::class)->find($c);
            if (! $campagne instanceof Campagne) {
                $campagne = (new Campagne())
                    ->setId($c)
                    ->setNumero(intdiv($c + 1, 2))
                    ->setDifficile( ($c % 2) == 0 )
                ;
                $manager->persist($campagne);
            }
            $campaigns[$campagne->getId()] = $campagne;
        }
        $manager->flush();
        for ($c = 1; $c <= 6; $c++) {
            for ($e = 1; $e <= 60; $e++) {
                $etapeId = $e + ($c - 1) * 60;
                $etape = $manager->getRepository(Etape::class)->find($etapeId);
                if (! $etape instanceof Etape) {
                    $etape = (new Etape())
                        ->setId($etapeId)
                        ->setCampagne($campaigns[$c])
                        ->setNumero($e)
                        ->setBoss(($e % 10) == 0)
                        ;
                    $manager->persist($etape);
                }
            }
        }
        $manager->flush();
    }
}
