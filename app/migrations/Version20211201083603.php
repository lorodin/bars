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
final class Version20211201083603 extends AbstractMigration
{

    use DumpMigration;

    public function getDescription(): string
    {
        return 'Loading data to ticket_flights table';
    }

    public function up(Schema $schema): void
    {
        $filePath = __DIR__ . '/dumps/ticket_flights.dump';
        $separator = "\t";

        $columnsFormat = [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT
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
                    "INSERT INTO bookings.ticket_flights (ticket_no, flight_id, fare_conditions, amount) 
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
                );

                $insertBody = "";
            }
        }

        if ($insertBody != '')
        {
            $this->addSql(
                "INSERT INTO bookings.ticket_flights (ticket_no, flight_id, fare_conditions, amount) 
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
            );
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
