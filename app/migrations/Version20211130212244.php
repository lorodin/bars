<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130212244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating airports table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE airports (airport_code VARCHAR(3) NOT NULL, airport_name TEXT NOT NULL, city TEXT NOT NULL, coordinates point NOT NULL, timezone smallint not null check(timezone >= -12 and timezone <= 12), PRIMARY KEY(airport_code))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE airports');
    }
}
