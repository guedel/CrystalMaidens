<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211228093049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etape_crystal (id INT AUTO_INCREMENT NOT NULL, crystal_id INT NOT NULL, etape_id INT DEFAULT NULL, minimum INT DEFAULT NULL, maximum INT DEFAULT NULL, INDEX IDX_DCE3BCC2B58139E8 (crystal_id), INDEX IDX_DCE3BCC24A8CA2AD (etape_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etape_crystal ADD CONSTRAINT FK_DCE3BCC2B58139E8 FOREIGN KEY (crystal_id) REFERENCES crystal (id)');
        $this->addSql('ALTER TABLE etape_crystal ADD CONSTRAINT FK_DCE3BCC24A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etape_crystal');
    }
}
