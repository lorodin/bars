<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211128124213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating table seats';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            "CREATE TABLE seats (
                aircraft_code VARCHAR(3) NOT NULL,
                seat_no VARCHAR(4) NOT NULL,
                fave_conditions varchar(10) not null check(fave_conditions in ('Economy', 'Comform', 'Business')),
                PRIMARY KEY(aircraft_code, seat_no))");

        $this->addSql("CREATE INDEX IDX_BFE25750A3A78D61 ON seats (aircraft_code)");

        $this->addSql(
            'ALTER TABLE seats
                    ADD CONSTRAINT FK_BFE25750A3A78D61
                        FOREIGN KEY (aircraft_code)
                            REFERENCES aircrafts (aircraft_code)
                            ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE seats');
    }
}
