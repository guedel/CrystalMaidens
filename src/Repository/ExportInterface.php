<?php declare(strict_types=1);

namespace App\Repository;

interface ExportInterface
{
    public function getExportFilename(): string;
    public function getExport(): mixed;
}
