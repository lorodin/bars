<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130225705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating bookings table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookings (book_ref VARCHAR(6) NOT NULL, book_date TIMESTAMP(0) WITH TIME ZONE NOT NULL, total_amount numeric(10, 2) not null, PRIMARY KEY(book_ref))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE bookings');
    }
}
