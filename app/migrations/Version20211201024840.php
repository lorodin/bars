<?php

declare(strict_types=1);

namespace App\Migrations;


include_once __DIR__ . "/abstracts/DumpTypesDefinitions.php";
include_once __DIR__ . "/abstracts/AbstractMigrationWithDump.php";

use Doctrine\DBAL\Schema\Schema;
use Migrations\Abstracts\AbstractMigrationWithDump;
use Migrations\Abstracts\DumpTypesDefinitions;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201024840 extends AbstractMigrationWithDump
{
    public function getDescription(): string
    {
        return 'Creating aircrafts_data table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE bookings.aircrafts_data (
                    aircraft_code char(3) NOT NULL,
                    model jsonb NOT NULL,
                    range integer NOT NULL CHECK(range > 0),
                    PRIMARY KEY(aircraft_code)
                 )');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.aircrafts_data');
    }

    protected function getColumnsFormat(): array
    {
        return [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::JSON_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT
        ];
    }

    protected function getTableName(): string
    {
        return 'bookings.aircrafts_data';
    }

    protected function getDumpFilePath(): string
    {
        return __DIR__ . '/dumps/aircrafts.dump';
    }
}
