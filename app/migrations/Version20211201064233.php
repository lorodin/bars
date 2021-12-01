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
final class Version20211201064233 extends AbstractMigration
{
    use DumpMigration;

    public function getDescription(): string
    {
        return 'Loading data to tickets table';
    }

    public function up(Schema $schema): void
    {
        $filePath = __DIR__ . '/dumps/tickets.dump';
        $separator = "\t";

        $columnsFormat = [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::JSON_FORMAT | DumpTypesDefinitions::NULLABLE
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
                    "INSERT INTO bookings.tickets (ticket_no, book_ref, passenger_id, passenger_name, contact_data) 
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
                );

                $insertBody = "";
            }
        }

        if ($insertBody != '')
        {
            $this->addSql(
                "INSERT INTO bookings.tickets (ticket_no, book_ref, passenger_id, passenger_name, contact_data) 
                            VALUES $insertBody
                            ON CONFLICT DO NOTHING"
            );
        }
    }

    public function down(Schema $schema): void
    {
    }
}
