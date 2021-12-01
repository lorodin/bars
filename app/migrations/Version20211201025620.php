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
final class Version20211201025620 extends AbstractMigration
{
    use DumpMigration;

    public function getDescription(): string
    {
        return 'Loading aircrafts data from sql dump';
    }

    public function up(Schema $schema): void
    {
        $filePath = __DIR__ . '/dumps/aircrafts.dump';
        $separator = "\t";
        $columnsFormat = [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::JSON_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT
        ];

        $insertBody = $this->getInsertBody($filePath, $separator, $columnsFormat);

        $this->addSql(
            "INSERT INTO bookings.aircrafts_data (aircraft_code, model, range)
                    VALUES $insertBody
                ON CONFLICT DO NOTHING"
        );
    }

    public function down(Schema $schema): void
    {
    }
}
