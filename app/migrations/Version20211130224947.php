<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130224947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating flights table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flights (flight_id SERIAL NOT NULL, departure_airport VARCHAR(3) NOT NULL, arrival_airport VARCHAR(3) NOT NULL, aircraft_code VARCHAR(3) NOT NULL, flight_no VARCHAR(6) NOT NULL, scheduled_departure TIMESTAMP(0) WITH TIME ZONE NOT NULL, scheduled_arrival timestamptz not null check(scheduled_arrival > scheduled_departure), status varchar(20) not null check(status in (\'On Time\', \'Delayed\', \'Departed\', \'Arrived\', \'Scheduled\', \'Cancelled\')), actual_departure TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, actual_arrival timestamptz
                            check (actual_arrival is null
                                    OR (actual_departure IS NOT NULL
                                        AND actual_arrival IS NOT NULL
                                        AND actual_arrival > actual_departure
                                        )
                             ), PRIMARY KEY(flight_id))');
        $this->addSql('CREATE INDEX IDX_FC74B5EAB55A39CA ON flights (arrival_airport)');
        $this->addSql('CREATE INDEX IDX_FC74B5EA64B6B073 ON flights (departure_airport)');
        $this->addSql('CREATE INDEX IDX_FC74B5EAA3A78D61 ON flights (aircraft_code)');
        $this->addSql('ALTER TABLE flights ADD CONSTRAINT FK_FC74B5EAB55A39CA FOREIGN KEY (arrival_airport) REFERENCES airports (airport_code) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE flights ADD CONSTRAINT FK_FC74B5EA64B6B073 FOREIGN KEY (departure_airport) REFERENCES airports (airport_code) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE flights ADD CONSTRAINT FK_FC74B5EAA3A78D61 FOREIGN KEY (aircraft_code) REFERENCES aircrafts (aircraft_code) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE flights');
    }
}
