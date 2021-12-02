<?php

namespace Migrations\Abstracts;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Symfony\Component\Config\Exception\FileLocatorFileNotFoundException;

abstract class AbstractMigrationWithDump extends AbstractMigration
{
    const SPEED_DUMP_LOW  = 10;
    const SPEED_DUMP_MID  = 50;
    const SPEED_DUMP_FAST = 100;

    protected string $separator = "\t";
    protected int $dumpSpeed = self::SPEED_DUMP_FAST;

    public function postUp(Schema $schema): void
    {
        if (!file_exists($this->getDumpFilePath()))
        {
            throw new \InvalidArgumentException("File `" . $this->getDumpFilePath() . "` not found");
        }

        $fileSize = filesize($this->getDumpFilePath());

        echo "Start load data from " .
                $this->getDumpFilePath() . " ($fileSize bytes) to table `" . $this->getTableName() . "`" . PHP_EOL;

        $insertQuery = function (string &$insertBody)
        {
            $query = "INSERT INTO " . $this->getTableName() . "  
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING";

            $this->connection->executeQuery($query);

            $insertBody = "";
        };

        $printProgress = function (int $bytes) use ($fileSize)
        {
            echo "\rProgress: " . ceil(100 * $bytes / $fileSize) . "%";
        };

        $insertBody = "";
        $totalBytes = 0;

        foreach ($this->getDataLine() as $line => $insert)
        {
            $totalBytes += $insert['bytes'];

            $printProgress($totalBytes);

            if ($insertBody != "")
            {
                $insertBody .= ', ';
            }

            $insertBody .= $insert['query'];

            if (($line + 1) % $this->dumpSpeed == 0)
            {
                $insertQuery($insertBody);
            }
        }

        if ($insertBody != "")
        {
            $insertQuery($insertBody);
            $printProgress($fileSize);
        }

        echo PHP_EOL . "Loading data to `" . $this->getTableName() . " is completed" . PHP_EOL;
    }

    private function getDataLine(): \Generator
    {
        $handle = null;

        try {
            $handle = fopen($this->getDumpFilePath(), "r");
            $columnsFormat = $this->getColumnsFormat();

            if (!$handle) {
                throw new FileLocatorFileNotFoundException("Fail to open file: " . $this->getDumpFilePath());
            }

            $lineNumber = 1;

            while (($line = fgets($handle)) !== false) {
                $columns = preg_split("/$this->separator/", $line);

                if (count($columns) != count($columnsFormat)) {
                    throw new \InvalidArgumentException("Fail to parse line($lineNumber): $line");
                }

                $insert = '';

                foreach ($columnsFormat as $index => $format) {
                    if ($insert != '') {
                        $insert .= ', ';
                    }

                    if (($format & DumpTypesDefinitions::NULLABLE) == DumpTypesDefinitions::NULLABLE &&
                        trim($columns[$index]) == "\N") {
                        $insert .= 'NULL';
                    } else {
                        $format = ($format >> 1) << 1;

                        switch ($format) {
                            case DumpTypesDefinitions::DATETIME_FORMAT:
                            case DumpTypesDefinitions::JSON_FORMAT:
                            case DumpTypesDefinitions::STRING_FORMAT:
                                $insert .= "'" . trim($columns[$index]) . "'";
                                break;
                            case DumpTypesDefinitions::NUMBER_FORMAT:
                                $insert .= trim($columns[$index]);
                                break;
                            case DumpTypesDefinitions::POINT_FORMAT:
                                $insert .= "point(" . trim($columns[$index], '()') . ")";
                                break;
                        }
                    }

                    if ($insert == '') {
                        throw new \InvalidArgumentException("Fail to parse line($lineNumber) column ($index): $columns[$insert]");
                    }
                }

                $lineNumber++;

                yield ["query" => "($insert)", "bytes" => strlen($line)];
            }
        } finally {
            if ($handle)
            {
                fclose($handle);
            }
        }
    }

    protected abstract function getColumnsFormat(): array;
    protected abstract function getTableName(): string;
    protected abstract function getDumpFilePath(): string;
}
