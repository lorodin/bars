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
final class Version20211201084858 extends AbstractMigration
{
    use DumpMigration;

    public function getDescription(): string
    {
        return 'Loading data to boarding_passes table';
    }

    public function up(Schema $schema): void
    {
        $filePath = __DIR__ . '/dumps/boarding_passes.dump';
        $separator = "\t";

        $columnsFormat = [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT
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
                    "INSERT INTO bookings.boarding_passes (ticket_no, flight_id, boarding_no, seat_no)  
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
                );

                $insertBody = "";
            }
        }

        if ($insertBody != '')
        {
            $this->addSql(
                "INSERT INTO bookings.boarding_passes (ticket_no, flight_id, boarding_no, seat_no)  
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
            );
        }
    }

    public function down(Schema $schema): void
    {
    }
}
