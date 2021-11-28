<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211128105054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create aircrafts table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aircrafts (aircraft_code VARCHAR(3) NOT NULL, model TEXT NOT NULL, PRIMARY KEY(aircraft_code))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE aircrafts');
    }
}
