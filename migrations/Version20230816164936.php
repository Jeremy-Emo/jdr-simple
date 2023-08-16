<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230816164936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe ADD aventure_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21873DBB5F FOREIGN KEY (aventure_id) REFERENCES aventure (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B98C21873DBB5F ON groupe (aventure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21873DBB5F');
        $this->addSql('DROP INDEX UNIQ_4B98C21873DBB5F ON groupe');
        $this->addSql('ALTER TABLE groupe DROP aventure_id');
    }
}
