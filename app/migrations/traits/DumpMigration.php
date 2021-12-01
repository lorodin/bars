<?php

namespace Migrations\Traits;

trait DumpMigration
{
    protected function getInsertBody(string $pathToDump, string $separator, array $columnsFormat): string
    {
        $insertBody = '';

        foreach ($this->getDataLine($pathToDump, $separator, $columnsFormat) as $index => $insert)
        {
            if ($index != 0)
            {
                $insertBody .= ',';
            }

            $insertBody .= $insert;
        }

        return $insertBody;
    }

    protected function getDataLine(string $pathToDump, string $separator, array $columnsFormat): \Generator
    {
        $handle = fopen($pathToDump, "r");

        if (!$handle)
        {
            throw new \InvalidArgumentException("Fail to open file: $pathToDump");
        }

        $lineNumber = 1;

        while (($line = fgets($handle)) !== false)
        {
            $columns = preg_split("/$separator/", $line);

            if (count($columns) != count($columnsFormat))
            {
                throw new \InvalidArgumentException("Fail to parse line($lineNumber): $line");
            }

            $insert = '';

            foreach ($columnsFormat as $index => $format)
            {
                if ($insert != '')
                {
                    $insert .= ', ';
                }

                if (($format & DumpTypesDefinitions::NULLABLE) == DumpTypesDefinitions::NULLABLE &&
                     trim($columns[$index]) == "\N")
                {
                    $insert .= 'NULL';
                } else {
                    $format = ($format >> 1) << 1;

                    switch ($format)
                    {
                        case DumpTypesDefinitions::DATETIME_FORMAT:
                        case DumpTypesDefinitions::JSON_FORMAT:
                        case DumpTypesDefinitions::STRING_FORMAT:
                            $insert .= "'" . trim($columns[$index]) . "'";
                            break;
                        case DumpTypesDefinitions::NUMBER_FORMAT:
                            $insert .= $columns[$index];
                            break;
                        case DumpTypesDefinitions::POINT_FORMAT:
                            $insert .= "point(" . trim($columns[$index], '()') . ")";
                            break;
                    }
                }

                if ($insert == '')
                {
                    throw new \InvalidArgumentException("Fail to parse line($lineNumber) column ($index): $columns[$insert]");
                }
            }

            $lineNumber++;

            yield "($insert)";
        }

        fclose($handle);
    }
}
