<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201042150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating view airports for table bookings.airports_data';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE VIEW bookings.airports AS
                     SELECT ml.airport_code,
                        (ml.airport_name ->> lang()) AS airport_name,
                        (ml.city ->> lang()) AS city,
                        ml.coordinates,
                        ml.timezone
                       FROM bookings.airports_data ml'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP VIEW bookings.airports');
    }
}
