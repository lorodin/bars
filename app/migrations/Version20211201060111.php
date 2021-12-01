<?php

declare(strict_types=1);

namespace App\Migrations;

include_once __DIR__ . "/traits/DumpTypesDefinitions.php";
include_once __DIR__ . "/traits/DumpMigration.php";

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Migrations\Traits\DumpMigration;
use Migrations\Traits\DumpTypesDefinitions;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201060111 extends AbstractMigration
{
    use DumpMigration;

    public function getDescription(): string
    {
        return 'Loading data to flights table';
    }

    public function up(Schema $schema): void
    {
        $filePath = __DIR__ . '/dumps/flights.dump';
        $separator = "\t";

        $columnsFormat = [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::DATETIME_FORMAT,
            DumpTypesDefinitions::DATETIME_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::DATETIME_FORMAT | DumpTypesDefinitions::NULLABLE,
            DumpTypesDefinitions::DATETIME_FORMAT | DumpTypesDefinitions::NULLABLE
        ];

        $insertBody = "";

        foreach ($this->getDataLine($filePath, $separator, $columnsFormat) as $line => $insert)
        {
            if ($insertBody != "")
            {
                $insertBody .= ', ';
            }

            $insertBody .= $insert;

            if ($line % 100 == 0)
            {
                $this->addSql(
                    "INSERT INTO bookings.flights 
                            (
                             flight_id,
                             flight_no,
                             scheduled_departure,
                             scheduled_arrival,
                             departure_airport,
                             arrival_airport,
                             status,
                             aircraft_code,
                             actual_departure,
                             actual_arrival
                             ) 
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
                );

                $insertBody = "";
            }
        }

        if ($insertBody != '')
        {
            $this->addSql(
                "INSERT INTO bookings.flights 
                            (
                             flight_id,
                             flight_no,
                             scheduled_departure,
                             scheduled_arrival,
                             departure_airport,
                             arrival_airport,
                             status,
                             aircraft_code,
                             actual_departure,
                             actual_arrival
                             ) 
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
            );
        }
    }

    public function down(Schema $schema): void
    {
    }
}
