<?php

declare(strict_types=1);

namespace Bars\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211124061416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'First migration';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable("test");
        $table->addColumn("id", "integer", ["unsigned" => true]);
        $table->addColumn("name", "string");
        $table->setPrimaryKey(["id"]);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable("test");
    }
}
