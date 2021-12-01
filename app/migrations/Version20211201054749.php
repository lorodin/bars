<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201054749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE bookings.flights (
                            flight_id SERIAL NOT NULL,
                            departure_airport CHAR(3) NOT NULL,
                            arrival_airport CHAR(3) NOT NULL,
                            aircraft_code CHAR(3) NOT NULL,
                            flight_no CHAR(6) NOT NULL,
                            scheduled_departure TIMESTAMP(0) WITH TIME ZONE NOT NULL,
                            scheduled_arrival timestamptz not null check(scheduled_arrival > scheduled_departure),
                            status varchar(20) not null 
                                check(status in (\'On Time\', \'Delayed\', \'Departed\', \'Arrived\', \'Scheduled\', \'Cancelled\')),
                            actual_departure TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL,
                            actual_arrival timestamptz 
                                check (actual_arrival is null
                                    OR (actual_departure IS NOT NULL
                                        AND actual_arrival IS NOT NULL
                                        AND actual_arrival > actual_departure
                                        )
                             ), PRIMARY KEY(flight_id))');

        $this->addSql(
            'CREATE INDEX IDX_B7372AA3B55A39CA ON bookings.flights (arrival_airport)'
        );

        $this->addSql(
            'CREATE INDEX IDX_B7372AA364B6B073 ON bookings.flights (departure_airport)'
        );

        $this->addSql(
            'CREATE INDEX IDX_B7372AA3A3A78D61 ON bookings.flights (aircraft_code)'
        );

        $this->addSql(
            'CREATE UNIQUE INDEX flight_no_unique ON bookings.flights (flight_no, scheduled_departure)'
        );

        $this->addSql(
            'ALTER TABLE bookings.flights ADD CONSTRAINT FK_B7372AA3B55A39CA 
                    FOREIGN KEY (arrival_airport)
                        REFERENCES bookings.airports_data (airport_code) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );

        $this->addSql(
            'ALTER TABLE bookings.flights ADD CONSTRAINT FK_B7372AA364B6B073
                    FOREIGN KEY (departure_airport)
                        REFERENCES bookings.airports_data (airport_code) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );

        $this->addSql(
            'ALTER TABLE bookings.flights ADD CONSTRAINT FK_B7372AA3A3A78D61
                    FOREIGN KEY (aircraft_code)
                        REFERENCES bookings.aircrafts_data (aircraft_code) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.flights');
    }
}
