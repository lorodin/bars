<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130231752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating tickets table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tickets (ticket_no VARCHAR(13) NOT NULL, book_ref VARCHAR(6) NOT NULL, passenger_id VARCHAR(20) NOT NULL, passenger_name VARCHAR(255) NOT NULL, contact_data jsonb, PRIMARY KEY(ticket_no))');
        $this->addSql('ALTER TABLE bookings ALTER total_amount TYPE NUMERIC(10, 0)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('ALTER TABLE bookings ALTER total_amount TYPE NUMERIC(10, 2)');
    }
}
