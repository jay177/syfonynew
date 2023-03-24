<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324075559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE grand_domaine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piste (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, ouvert TINYINT(1) DEFAULT NULL, horaire VARCHAR(255) DEFAULT NULL, dificulté VARCHAR(255) DEFAULT NULL, INDEX IDX_59E2507721BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remontees (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, open TINYINT(1) DEFAULT NULL, horaire VARCHAR(255) NOT NULL, message LONGTEXT DEFAULT NULL, INDEX IDX_EE5189C021BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, state TINYINT(1) DEFAULT NULL, note INT DEFAULT NULL, INDEX IDX_9F39F8B121BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piste ADD CONSTRAINT FK_59E2507721BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE remontees ADD CONSTRAINT FK_EE5189C021BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE station ADD CONSTRAINT FK_9F39F8B121BDB235 FOREIGN KEY (station_id) REFERENCES grand_domaine (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piste DROP FOREIGN KEY FK_59E2507721BDB235');
        $this->addSql('ALTER TABLE remontees DROP FOREIGN KEY FK_EE5189C021BDB235');
        $this->addSql('ALTER TABLE station DROP FOREIGN KEY FK_9F39F8B121BDB235');
        $this->addSql('DROP TABLE grand_domaine');
        $this->addSql('DROP TABLE piste');
        $this->addSql('DROP TABLE remontees');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE user');
    }
}
