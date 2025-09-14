<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\{Campagne, Etape};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EtapesFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->doLoad('Etapes.csv') as $line) {
            $campagneId = $line[0];
            $campagne = $manager->getRepository(Campagne::class)->find($campagneId);
            if (! $campagne instanceof Campagne) {
                throw new \Exception("Campaign $campagneId does not exist");
            }
            $entity = $manager->getRepository(Etape::class)->findOneBy(['campagne' => $campagne, 'numero' => $line[1]]);
            if (! $entity instanceof Etape) {
                $entity = (new Etape())
                    ->setNumero($line[1])
                    ->setCampagne($campagne);
                $manager->persist($entity);
            }
            $entity
                ->setBoss($line[2])
                ->setEnergie($line[3])
                ->setExperience($line[4])
                ->setExpMaiden($line[5])
                ->setCoins($line[6])
                ->setMinGachaOrbs($line[7])
                ->setMaxGachaOrbs($line[8])
            ;
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [CampaignFixtures::class];
    }

    protected function convert(int $index, mixed $value): mixed
    {
        return match ($index) {
            1, 3, 4, 5, 6, 7, 8 => self::valOptInt($value),
            2 => boolval($value),
            default => $value
        };
    }
}
