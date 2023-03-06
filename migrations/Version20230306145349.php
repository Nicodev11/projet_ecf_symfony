<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306145349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plates ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plates ADD CONSTRAINT FK_E7C6D9A0CCD7E912 FOREIGN KEY (menu_id) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_E7C6D9A0CCD7E912 ON plates (menu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plates DROP FOREIGN KEY FK_E7C6D9A0CCD7E912');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP INDEX IDX_E7C6D9A0CCD7E912 ON plates');
        $this->addSql('ALTER TABLE plates DROP menu_id');
    }
}
