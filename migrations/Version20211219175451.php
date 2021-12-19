<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219175451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crystal (id INT NOT NULL, nature_id INT NOT NULL, INDEX IDX_878A1F193BCB2E4B (nature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE crystal ADD CONSTRAINT FK_878A1F193BCB2E4B FOREIGN KEY (nature_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE crystal ADD CONSTRAINT FK_878A1F19BF396750 FOREIGN KEY (id) REFERENCES ingredient (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE crystal');
    }
}
