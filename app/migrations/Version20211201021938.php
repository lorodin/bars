<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201021938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Init database functions';
    }

    public function up(Schema $schema): void
    {
        $createLangFunction =
            "CREATE FUNCTION lang() RETURNS text
             LANGUAGE plpgsql STABLE
             AS $$
             BEGIN
               RETURN current_setting('bookings.lang');
             EXCEPTION
                WHEN undefined_object THEN
                  RETURN NULL;
             END;
             $$;";

        $this->addSql(
            "CREATE SCHEMA bookings"
        );

        $this->addSql(
            'ALTER DATABASE ' . $this->connection->getDatabase() . ' SET bookings.lang = ru'
        );

        $this->addSql(
            "COMMENT ON SCHEMA bookings IS 'Airlines demo database schema'"
        );

        $this->addSql($createLangFunction);
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP FUNCTION lang");
        $this->addSql("DROP SCHEMA bookings");
    }
}
