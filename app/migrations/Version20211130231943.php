<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130231943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Added ticket foreign key on booking';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4E5124735 FOREIGN KEY (book_ref) REFERENCES bookings (book_ref) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_54469DF4E5124735 ON tickets (book_ref)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tickets DROP CONSTRAINT FK_54469DF4E5124735');
        $this->addSql('DROP INDEX IDX_54469DF4E5124735');
    }
}
