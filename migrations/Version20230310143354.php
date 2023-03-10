<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310143354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menus ADD entries1 VARCHAR(255) NOT NULL, ADD entries2 VARCHAR(255) DEFAULT NULL, ADD dishe1 VARCHAR(255) NOT NULL, ADD dishe2 VARCHAR(255) DEFAULT NULL, ADD dessert1 VARCHAR(255) NOT NULL, ADD dessert2 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menus DROP entries1, DROP entries2, DROP dishe1, DROP dishe2, DROP dessert1, DROP dessert2');
    }
}
