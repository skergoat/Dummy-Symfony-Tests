<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200124102038 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__developer AS SELECT id, name, languages, price, experience FROM developer');
        $this->addSql('DROP TABLE developer');
        $this->addSql('CREATE TABLE developer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL COLLATE BINARY, languages VARCHAR(255) DEFAULT NULL COLLATE BINARY, price VARCHAR(255) DEFAULT NULL, experience INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO developer (id, name, languages, price, experience) SELECT id, name, languages, price, experience FROM __temp__developer');
        $this->addSql('DROP TABLE __temp__developer');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__developer AS SELECT id, name, languages, price, experience FROM developer');
        $this->addSql('DROP TABLE developer');
        $this->addSql('CREATE TABLE developer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, languages VARCHAR(255) DEFAULT NULL, price INTEGER DEFAULT NULL, experience VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO developer (id, name, languages, price, experience) SELECT id, name, languages, price, experience FROM __temp__developer');
        $this->addSql('DROP TABLE __temp__developer');
    }
}
