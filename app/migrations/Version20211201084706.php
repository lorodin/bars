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
final class Version20211201084706 extends AbstractMigrationWithDump
{
    public function getDescription(): string
    {
        return 'Creating table boarding_passes';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE bookings.boarding_passes (
                    ticket_no VARCHAR(13) NOT NULL,
                    flight_id INT NOT NULL,
                    boarding_no INT NOT NULL,
                    seat_no CHAR(4) NOT NULL,
                    PRIMARY KEY(ticket_no, flight_id)
                  )'
        );

        $this->addSql(
            'CREATE UNIQUE INDEX flight_boarding ON bookings.boarding_passes (flight_id, boarding_no)'
        );

        $this->addSql(
            'CREATE UNIQUE INDEX flight_seat ON bookings.boarding_passes (flight_id, seat_no)'
        );

        $this->addSql(
            'CREATE UNIQUE INDEX ticket_flights_uniq ON bookings.boarding_passes (ticket_no, flight_id)'
        );

        $this->addSql(
            'ALTER TABLE bookings.boarding_passes ADD CONSTRAINT FK_72AD8B9AA893089D91F478C5
                    FOREIGN KEY (ticket_no, flight_id)
                        REFERENCES bookings.ticket_flights (ticket_no, flight_id)
                        ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.boarding_passes');
    }

    protected function getColumnsFormat(): array
    {
        return [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT
        ];
    }

    protected function getTableName(): string
    {
        return 'bookings.boarding_passes';
    }

    protected function getDumpFilePath(): string
    {
        return __DIR__ . '/dumps/boarding_passes.dump';
    }
}
