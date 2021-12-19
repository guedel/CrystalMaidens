<?php

namespace App\DataFixtures;

use App\Entity\{Campagne, Etape};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Campaign extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($c = 1; $c <= 6; $c++) {
            //$campagne = $manager->
            $campagne = $manager->getRepository(Campagne::class)->find($c);
            if (! $campagne instanceof Campagne) {
                $campagne = (new Campagne())
                ->setId($c)
                ;
                $manager->persist($campagne);
            }
            $campagne
                ->setNumero(intdiv($c + 1, 2))
                ->setDifficile( ($c % 2) == 0 )
            ;
            for ($e = 1; $e <= 60; $e++) {
                $etape = $manager->getRepository(Etape::class)->find($e);
                if (! $etape instanceof Etape) {
                    $etape = (new Etape())
                        ->setId($e + ($c - 1) * 60)
                    ;
                    $manager->persist($etape);
                }
                $etape
                    ->setCampagne($campagne)
                    ->setNumero($e)
                    ->setBoss(($e % 10) == 0)
                ;
            }
        }

        $manager->flush();
    }
}
