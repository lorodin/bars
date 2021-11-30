<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130232653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating ticket_flights table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticket_flights (ticket_no VARCHAR(13) NOT NULL, flight_id INT NOT NULL, fare_conditions varchar(10) not null check(fare_conditions in (\'Economy\', \'Comfort\', \'Business\')), amount numeric(10, 2) not null check(amount > 0), PRIMARY KEY(ticket_no, flight_id))');
        $this->addSql('CREATE INDEX IDX_F0B8ECB891F478C5 ON ticket_flights (flight_id)');
        $this->addSql('CREATE INDEX IDX_F0B8ECB8A893089D ON ticket_flights (ticket_no)');
        $this->addSql('ALTER TABLE ticket_flights ADD CONSTRAINT FK_F0B8ECB891F478C5 FOREIGN KEY (flight_id) REFERENCES flights (flight_id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket_flights ADD CONSTRAINT FK_F0B8ECB8A893089D FOREIGN KEY (ticket_no) REFERENCES tickets (ticket_no) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE ticket_flights');
    }
}
