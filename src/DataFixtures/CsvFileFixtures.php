<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Filesystem\{Filesystem, Path};
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

abstract class CsvFileFixtures extends Fixture implements DependentFixtureInterface
{
    public function doLoad($fileName): void
    {
        $fs = new FileSystem();
        $findFile = Path::join(__DIR__, 'Files', $fileName);
        if ($fs->exists($findFile) && is_readable($findFile)) {
            $file = fopen($findFile, 'r');
        } else {
            throw new FileNotFoundException(null, 0, null, $findFile);
        }

        while (! feof($file)) {
            $line = fgetcsv($file, 0, ";");
            if (is_array($line)) {
                yield $line;
            }

        }
        fclose($file);
    }

    public abstract function getDependencies(): array;
}
