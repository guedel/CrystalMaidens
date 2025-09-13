<?php

namespace App\DataFixtures;

use App\Entity\{
    Campagne,
    Etape,
    EtapeItem,
    Item,
    Rarete
};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtapeItemFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach($this->doLoad('EtapeItem.csv') as $row) {
            $campagne = $manager->getRepository(Campagne::class)->find($row[0]);
            if (! $campagne instanceof Campagne) {
                continue;
            }
            $etape = $manager->getRepository(Etape::class)->findOneBy(['campagne' => $campagne, 'numero' => $row[1]]);
            if (! $etape instanceof Etape) {
                continue;
            }
            $item = $manager->getRepository(Item::class)->findOneBy(['nom' => $row[3]]);
            if (! $item instanceof Item) {
                continue;
            }
            $rarity = $manager->getRepository(Rarete::class)->findOneBy(['nom' => $row[4]]);
            $entity = $manager->getRepository(EtapeItem::class)->findOneBy(['etape' => $etape, 'item' => $item]);
            if (! $entity instanceof EtapeItem) {
                $entity = (new EtapeItem())
                    ->setEtape($etape)
                    ->setItem($item)
                ;
                $manager->persist($entity);
            }
            $taux = str_replace(',', '.', (string) $row[2]);
            $entity->setTaux($taux);
            $entity->setRarity($rarity);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EtapesFixtures::class,
            ItemsFixtures::class,
            RareteFixtures::class,
        ];
    }
}
