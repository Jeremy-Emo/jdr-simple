<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230815201925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, aventure_id INT NOT NULL, nom VARCHAR(255) NOT NULL, infos LONGTEXT NOT NULL, INDEX IDX_93ADAABB873DBB5F (aventure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE path (id INT AUTO_INCREMENT NOT NULL, from_map_id INT NOT NULL, to_map_id INT NOT NULL, infos LONGTEXT NOT NULL, INDEX IDX_B548B0FDEF424B4 (from_map_id), INDEX IDX_B548B0F751753F9 (to_map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABB873DBB5F FOREIGN KEY (aventure_id) REFERENCES aventure (id)');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0FDEF424B4 FOREIGN KEY (from_map_id) REFERENCES map (id)');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0F751753F9 FOREIGN KEY (to_map_id) REFERENCES map (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABB873DBB5F');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0FDEF424B4');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0F751753F9');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE path');
    }
}
