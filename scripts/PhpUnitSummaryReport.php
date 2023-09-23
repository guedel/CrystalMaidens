<?php

  namespace Scripts;

  class PhpUnitSummaryReport
  {
    private const ReportFile = __DIR__ . '/../var/coverage/coverage.txt';
    public static function outputSummary()
    {
      if (file_exists(self::ReportFile)) {
        echo file_get_contents(self::ReportFile);
      } else {
        echo __DIR__, PHP_EOL;
        echo "No report file found";
      }
      echo PHP_EOL;
    }
  }