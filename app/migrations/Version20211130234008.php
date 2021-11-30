<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130234008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating table boarding_passes';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boarding_passes (ticket_no VARCHAR(13) NOT NULL, flight_id INT NOT NULL, boarding_no INT NOT NULL, seat_no VARCHAR(4) NOT NULL, PRIMARY KEY(ticket_no, flight_id))');
        $this->addSql('CREATE UNIQUE INDEX ticket_flights_uniq ON boarding_passes (ticket_no, flight_id)');
        $this->addSql('ALTER TABLE boarding_passes ADD CONSTRAINT FK_FB104513A893089D91F478C5 FOREIGN KEY (ticket_no, flight_id) REFERENCES ticket_flights (ticket_no, flight_id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket_flights ALTER fare_conditions TYPE VARCHAR(20)');
        $this->addSql('ALTER TABLE ticket_flights ALTER amount TYPE NUMERIC(10, 0)');
        $this->addSql('ALTER TABLE tickets ALTER passenger_name TYPE TEXT');
        $this->addSql('ALTER TABLE tickets ALTER passenger_name DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE boarding_passes');
        $this->addSql('ALTER TABLE ticket_flights ALTER fare_conditions TYPE VARCHAR(10)');
        $this->addSql('ALTER TABLE ticket_flights ALTER amount TYPE NUMERIC(10, 2)');
        $this->addSql('ALTER TABLE tickets ALTER passenger_name TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE tickets ALTER passenger_name DROP DEFAULT');
    }
}
