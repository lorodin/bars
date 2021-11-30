<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130234131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating unique indexes for boarding_passes';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX flight_boarding ON boarding_passes (flight_id, boarding_no)');
        $this->addSql('CREATE UNIQUE INDEX flight_seat ON boarding_passes (flight_id, seat_no)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX flight_boarding');
        $this->addSql('DROP INDEX flight_seat');
    }
}
