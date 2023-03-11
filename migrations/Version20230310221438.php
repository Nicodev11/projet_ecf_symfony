<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310221438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD end_at_id INT NOT NULL');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE6EB2C50C FOREIGN KEY (end_at_id) REFERENCES restaurant_hours (id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE6EB2C50C ON booking (end_at_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE6EB2C50C');
        $this->addSql('DROP INDEX IDX_E00CEDDE6EB2C50C ON booking');
        $this->addSql('ALTER TABLE booking DROP end_at_id');
    }
}
