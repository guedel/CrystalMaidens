<?php declare(strict_types=1);

namespace Scripts;

class FunctionalTests
{
    private static string $databaseName = 'var/data-test.db';
    public static function run(): int
    {
        self::prepareDatabase();
        return 0;
    }

    private static function prepareDatabase(): void
    {
        if (file_exists(self::$databaseName)) {
            unlink(self::$databaseName);
        }

    }
}
