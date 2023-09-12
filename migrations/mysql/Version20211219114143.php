<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219114143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient_constituant (id INT AUTO_INCREMENT NOT NULL, ingredient_id INT DEFAULT NULL, constituant_id INT DEFAULT NULL, quantity INT DEFAULT NULL, INDEX IDX_E3CF2E4933FE08C (ingredient_id), INDEX IDX_E3CF2E4AFF81B7B (constituant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient_constituant ADD CONSTRAINT FK_E3CF2E4933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE ingredient_constituant ADD CONSTRAINT FK_E3CF2E4AFF81B7B FOREIGN KEY (constituant_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ingredient_constituant');
    }
}
