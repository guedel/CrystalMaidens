<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219182332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD maiden_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EC904F22D FOREIGN KEY (maiden_id) REFERENCES maiden (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251EC904F22D ON item (maiden_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EC904F22D');
        $this->addSql('DROP INDEX IDX_1F1B251EC904F22D ON item');
        $this->addSql('ALTER TABLE item DROP maiden_id');
    }
}
