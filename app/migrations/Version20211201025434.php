<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201025434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating aircraft view for table aircrafts_data';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE VIEW bookings.aircraft AS
                SELECT ml.aircraft_code,
                (ml.model ->> lang()) AS model,
                ml.range
            FROM bookings.aircrafts_data ml;
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql(
            'DROP VIEW bookings.aircraft'
        );
    }
}
