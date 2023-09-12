<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219211319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maiden ADD classe_id INT NOT NULL, ADD element_id INT NOT NULL, ADD rarity_id INT NOT NULL');
        $this->addSql('ALTER TABLE maiden ADD CONSTRAINT FK_1A8AEB128F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE maiden ADD CONSTRAINT FK_1A8AEB121F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE maiden ADD CONSTRAINT FK_1A8AEB12F3747573 FOREIGN KEY (rarity_id) REFERENCES rarete (id)');
        $this->addSql('CREATE INDEX IDX_1A8AEB128F5EA509 ON maiden (classe_id)');
        $this->addSql('CREATE INDEX IDX_1A8AEB121F1F2A24 ON maiden (element_id)');
        $this->addSql('CREATE INDEX IDX_1A8AEB12F3747573 ON maiden (rarity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maiden DROP FOREIGN KEY FK_1A8AEB128F5EA509');
        $this->addSql('ALTER TABLE maiden DROP FOREIGN KEY FK_1A8AEB121F1F2A24');
        $this->addSql('ALTER TABLE maiden DROP FOREIGN KEY FK_1A8AEB12F3747573');
        $this->addSql('DROP INDEX IDX_1A8AEB128F5EA509 ON maiden');
        $this->addSql('DROP INDEX IDX_1A8AEB121F1F2A24 ON maiden');
        $this->addSql('DROP INDEX IDX_1A8AEB12F3747573 ON maiden');
        $this->addSql('ALTER TABLE maiden DROP classe_id, DROP element_id, DROP rarity_id');
    }
}
