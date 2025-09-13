<?php

namespace App\DataFixtures;

use App\Entity\{
    Campagne,
    Classe,
    Element,
    Etape,
    EtapeAdversaire
};
use Doctrine\Persistence\ObjectManager;

class EtapeAdversaireFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach($this->doLoad('EtapeAdversaire.csv') as $row) {
            $campagne = $manager->getRepository(Campagne::class)->find($row[0]);
            if (! $campagne instanceof Campagne) {
                continue;
            }
            $etape = $manager->getRepository(Etape::class)->findOneBy(['campagne' => $campagne, 'numero' => $row[1]]);
            if (! $etape instanceof Etape) {
                continue;
            }
            $classe = $manager->getRepository(Classe::class)->findOneBy(['nom' => $row[2]]);
            if (! $classe instanceof Classe) {
                continue;
            }
            $nature = $manager->getRepository(Element::class)->findOneBy(['nom' => $row[3]]);
            if (! $nature instanceOf Element) {
                continue;
            }
            $entity = $manager->getRepository(EtapeAdversaire::class)->findOneBy([
                'etape' => $etape,
            ]);
            if (! $entity instanceof EtapeAdversaire) {
                $entity = (new EtapeAdversaire())
                    ->setEtape($etape);
                $manager->persist($entity);
            }
            $entity
                ->setClasse($classe)
                ->setElement($nature)
                ->setQuantity($row[4])
            ;
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EtapesFixtures::class,
            ClasseFixtures::class,
            ElementFixtures::class,
        ];
    }
}
