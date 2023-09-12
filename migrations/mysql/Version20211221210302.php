<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221210302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etape_fragment (id INT AUTO_INCREMENT NOT NULL, maiden_id INT NOT NULL, etape_id INT DEFAULT NULL, minimum INT DEFAULT NULL, maximum INT DEFAULT NULL, INDEX IDX_DAF77713C904F22D (maiden_id), INDEX IDX_DAF777134A8CA2AD (etape_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etape_fragment ADD CONSTRAINT FK_DAF77713C904F22D FOREIGN KEY (maiden_id) REFERENCES maiden (id)');
        $this->addSql('ALTER TABLE etape_fragment ADD CONSTRAINT FK_DAF777134A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etape_fragment');
    }
}
