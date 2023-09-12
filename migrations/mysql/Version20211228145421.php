<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211228145421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add etape_item table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etape_item (id INT AUTO_INCREMENT NOT NULL, etape_id INT NOT NULL, item_id INT NOT NULL, rarity_id INT DEFAULT NULL, taux NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_550779644A8CA2AD (etape_id), INDEX IDX_55077964126F525E (item_id), INDEX IDX_55077964F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etape_item ADD CONSTRAINT FK_550779644A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id)');
        $this->addSql('ALTER TABLE etape_item ADD CONSTRAINT FK_55077964126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE etape_item ADD CONSTRAINT FK_55077964F3747573 FOREIGN KEY (rarity_id) REFERENCES rarete (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etape_item');
    }
}
