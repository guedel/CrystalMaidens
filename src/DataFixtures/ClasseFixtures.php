<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClasseFixtures extends Fixture
{
    /** @var string[] */
    private static array $classes = [
        'warrior',
        'mage',
        'support',
        'marksman',
        'engineer',
        'all',
    ];

    public function load(ObjectManager $manager): void
    {

        foreach (self::$classes as $classe) {
            $entity = $manager->getRepository(Classe::class)->findOneBy(['nom' => $classe]);
            if (! $entity instanceof Classe) {
                $entity = (new Classe())
                    ->setNom($classe);
                $manager->persist($entity);
            }
        }
        $manager->flush();
    }
}
