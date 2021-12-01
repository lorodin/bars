<?php

declare(strict_types=1);

namespace App\Migrations;

include_once __DIR__ . "/traits/DumpTypesDefinitions.php";
include_once __DIR__ . "/traits/DumpMigration.php";

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Migrations\Traits\DumpMigration;
use Migrations\Traits\DumpTypesDefinitions;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201054636 extends AbstractMigration
{
    use DumpMigration;

    public function getDescription(): string
    {
        return 'Loading data to bookings';
    }

    public function up(Schema $schema): void
    {
        $filePath = __DIR__ . '/dumps/bookings.dump';
        $separator = "\t";
        $columnsFormat = [
            DumpTypesDefinitions::STRING_FORMAT,
            DumpTypesDefinitions::DATETIME_FORMAT,
            DumpTypesDefinitions::NUMBER_FORMAT
        ];

        $insertBody = $this->getInsertBody($filePath, $separator, $columnsFormat);

        $this->addSql(
            "INSERT INTO bookings.bookings (book_ref, book_date, total_amount)
                    VALUES $insertBody
                ON CONFLICT DO NOTHING"
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
