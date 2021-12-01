<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201024840 extends AbstractMigration
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
}
