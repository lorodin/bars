<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201084706 extends AbstractMigration
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
                    seat_no VARCHAR(4) NOT NULL,
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
}
