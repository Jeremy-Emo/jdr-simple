<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230815135849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aventure (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, synopsis LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, stat_force INT NOT NULL, stat_esprit INT NOT NULL, stat_agilite INT NOT NULL, stat_charisme INT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, effets LONGTEXT NOT NULL, INDEX IDX_5E3DE4775E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4775E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE joueur ADD groupe_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C57A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('CREATE INDEX IDX_FD71A9C57A45358C ON joueur (groupe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C57A45358C');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4775E315342');
        $this->addSql('DROP TABLE aventure');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP INDEX IDX_FD71A9C57A45358C ON joueur');
        $this->addSql('ALTER TABLE joueur DROP groupe_id, DROP nom');
    }
}
