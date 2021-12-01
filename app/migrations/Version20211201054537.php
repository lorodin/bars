<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201054537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating bookings table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE bookings.bookings (
                    book_ref CHAR(6) NOT NULL,
                    book_date TIMESTAMP(0) WITH TIME ZONE NOT NULL,
                    total_amount NUMERIC(10, 2) NOT NULL,
                    PRIMARY KEY(book_ref)
               )');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.bookings');
    }
}
