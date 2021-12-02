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
final class Version20211201041947 extends AbstractMigrationWithDump
{
    public function getDescription(): string
    {
        return 'Creating table airports_data';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE bookings.airports_data (
                    airport_code char(3) NOT NULL,
                    airport_name jsonb NOT NULL,
                    city jsonb NOT NULL,
                    coordinates point not null,
                    timezone TEXT NOT NULL,
                    PRIMARY KEY(airport_code)
                )'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.airports_data');
    }

    protected function getColumnsFormat(): array
    {
        return [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::JSON_FORMAT,
            DumpTypesDefinitions::JSON_FORMAT,
            DumpTypesDefinitions::POINT_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT
        ];
    }

    protected function getTableName(): string
    {
        return 'bookings.airports_data';
    }

    protected function getDumpFilePath(): string
    {
        return __DIR__ . '/dumps/airports.dump';
    }
}
