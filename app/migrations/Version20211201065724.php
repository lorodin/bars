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
final class Version20211201065724 extends AbstractMigrationWithDump
{
    public function getDescription(): string
    {
        return 'Creating ticket_flights table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE bookings.ticket_flights (
                    ticket_no CHAR(13) NOT NULL,
                    flight_id INT NOT NULL,
                    fare_conditions varchar(10) not null check(fare_conditions in (\'Economy\', \'Comfort\', \'Business\')),
                    amount numeric(10, 2) not null check(amount > 0),
                    PRIMARY KEY(ticket_no, flight_id)
                 )'
        );

        $this->addSql(
            'CREATE INDEX IDX_9E5D852191F478C5 ON bookings.ticket_flights (flight_id)'
        );

        $this->addSql(
            'CREATE INDEX IDX_9E5D8521A893089D ON bookings.ticket_flights (ticket_no)'
        );

        $this->addSql(
            'ALTER TABLE bookings.ticket_flights ADD CONSTRAINT FK_9E5D852191F478C5
                    FOREIGN KEY (flight_id) REFERENCES bookings.flights (flight_id)
                        ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE'
        );

        $this->addSql(
            'ALTER TABLE bookings.ticket_flights ADD CONSTRAINT FK_9E5D8521A893089D
                    FOREIGN KEY (ticket_no) REFERENCES bookings.tickets (ticket_no)
                        ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.ticket_flights');
    }

    protected function getColumnsFormat(): array
    {
        return [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT,
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT
        ];
    }

    protected function getTableName(): string
    {
        return 'bookings.ticket_flights';
    }

    protected function getDumpFilePath(): string
    {
        return __DIR__ . '/dumps/ticket_flights.dump';
    }
}
