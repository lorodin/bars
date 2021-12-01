<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201041947 extends AbstractMigration
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
}
