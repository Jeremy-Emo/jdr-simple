<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230818161804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0FDEF424B4 FOREIGN KEY (from_map_id) REFERENCES map (id)');
        $this->addSql('CREATE INDEX IDX_B548B0FDEF424B4 ON path (from_map_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0FDEF424B4');
        $this->addSql('DROP INDEX IDX_B548B0FDEF424B4 ON path');
    }
}
