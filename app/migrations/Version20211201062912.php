<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201062912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating seats table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE bookings.seats (
                    aircraft_code CHAR(3) NOT NULL,
                    seat_no VARCHAR(4) NOT NULL,
                    fave_conditions varchar(10) not null check(fave_conditions in (\'Economy\', \'Comfort\', \'Business\')),
                    PRIMARY KEY(aircraft_code, seat_no))'
        );

        $this->addSql(
            'CREATE INDEX IDX_46230DBEA3A78D61 ON bookings.seats (aircraft_code)'
        );

        $this->addSql(
            'ALTER TABLE bookings.seats ADD CONSTRAINT FK_46230DBEA3A78D61
                    FOREIGN KEY (aircraft_code) REFERENCES bookings.aircrafts_data (aircraft_code)
                        ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.seats');
    }
}
