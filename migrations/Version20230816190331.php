<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230816190331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joueur ADD selected_personnage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C58C3834AD FOREIGN KEY (selected_personnage_id) REFERENCES personnage (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD71A9C58C3834AD ON joueur (selected_personnage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C58C3834AD');
        $this->addSql('DROP INDEX UNIQ_FD71A9C58C3834AD ON joueur');
        $this->addSql('ALTER TABLE joueur DROP selected_personnage_id');
    }
}
