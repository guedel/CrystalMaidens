<?php declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Filesystem\{Filesystem, Path};
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

abstract class CsvFileFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param string $fileName
     * @return \Generator
     */
    public function doLoad(string $fileName): \Generator
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
                yield $this->convertArrayTypes($line);
            }
        }
        fclose($file);
    }

    protected function convert(int $index, mixed $value): mixed
    {
        return match ($index) {
            default => $value
        };
    }

    /**
     * @param array<int,mixed> $array
     * @return array<int, mixed>
     */
    private function convertArrayTypes(array $array): array
    {
        $return = [];
        foreach ($array as $key => $value) {
            $return[$key] = $this->convert($key, $value);
        }
        return $return;
    }

    protected static function valOptInt(mixed $value): ?int
    {
        return empty($value) ? null : intval($value);
    }
}
