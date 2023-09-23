<?php

namespace App\DataFixtures;

use App\Entity\Element;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ElementFixtures extends Fixture
{
    private static array $elements = [
        'fire',
        'water',
        'nature',
        'light',
        'dark',
        'abyssal',
        'celestial',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$elements as $element) {
            $entity = $manager->getRepository(Element::class)->findOneBy(['nom' => $element]);
            if (! $entity instanceof Element) {
                $entity = (new Element())
                    ->setNom($element)
                ;
                $manager->persist($entity);
            }
        }
        $manager->flush();
    }
}
