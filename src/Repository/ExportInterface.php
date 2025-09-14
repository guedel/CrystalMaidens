<?php

namespace App\Repository;

interface ExportInterface
{
    public function getExportFilename();
    public function getExport();
}
