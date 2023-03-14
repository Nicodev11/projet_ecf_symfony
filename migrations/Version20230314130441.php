<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314130441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE date_reservations DROP FOREIGN KEY FK_8F1745F3A5DD6A85');
        $this->addSql('DROP TABLE date_reservations');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE date_reservations (id INT AUTO_INCREMENT NOT NULL, date_at_id INT DEFAULT NULL, INDEX IDX_8F1745F3A5DD6A85 (date_at_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE date_reservations ADD CONSTRAINT FK_8F1745F3A5DD6A85 FOREIGN KEY (date_at_id) REFERENCES reservations (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
