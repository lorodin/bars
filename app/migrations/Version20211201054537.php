<?php

declare(strict_types=1);

namespace App\Migrations;

include_once __DIR__ . "/abstracts/DumpTypesDefinitions.php";
include_once __DIR__ . "/abstracts/AbstractMigrationWithDump.php";

use Doctrine\DBAL\Schema\Schema;
use Migrations\Abstracts\AbstractMigrationWithDump;
use Migrations\Abstracts\DumpTypesDefinitions;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201054537 extends AbstractMigrationWithDump
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

    protected function getColumnsFormat(): array
    {
        return [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::DATETIME_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT
        ];
    }

    protected function getTableName(): string
    {
        return 'bookings.bookings';
    }

    protected function getDumpFilePath(): string
    {
        return __DIR__ . '/dumps/bookings.dump';
    }
}
