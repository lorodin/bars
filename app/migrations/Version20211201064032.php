<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201064032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Loading data to seats table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE bookings.tickets (
                    ticket_no CHAR(13) NOT NULL,
                    book_ref CHAR(6) NOT NULL,
                    passenger_id VARCHAR(20) NOT NULL,
                    passenger_name TEXT NOT NULL,
                    contact_data jsonb,
                    PRIMARY KEY(ticket_no)
                  )');

        $this->addSql(
            'CREATE INDEX IDX_1F0502BDE5124735 ON bookings.tickets (book_ref)'
        );

        $this->addSql(
            'ALTER TABLE bookings.tickets ADD CONSTRAINT FK_1F0502BDE5124735
                    FOREIGN KEY (book_ref) REFERENCES bookings.bookings (book_ref)
                        NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE bookings.tickets');
    }
}
