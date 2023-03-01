<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301145711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plates DROP FOREIGN KEY FK_E7C6D9A0A21214B7');
        $this->addSql('ALTER TABLE plates ADD CONSTRAINT FK_E7C6D9A0A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plates DROP FOREIGN KEY FK_E7C6D9A0A21214B7');
        $this->addSql('ALTER TABLE plates ADD CONSTRAINT FK_E7C6D9A0A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
