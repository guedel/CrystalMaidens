<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219060342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_539B5D16F55AE19E10CEE60C ON campagne (numero, difficile)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F87BF968F87BF96 ON classe (classe)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_41405E396C6E55B5 ON element (nom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0CF65F66C6E55B5 ON emplacement (nom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AADB1B6D6C6E55B5 ON rarete (nom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_809A3D7D809A3D7D ON taux (taux)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_539B5D16F55AE19E10CEE60C ON campagne');
        $this->addSql('DROP INDEX UNIQ_8F87BF968F87BF96 ON classe');
        $this->addSql('DROP INDEX UNIQ_41405E396C6E55B5 ON element');
        $this->addSql('DROP INDEX UNIQ_C0CF65F66C6E55B5 ON emplacement');
        $this->addSql('DROP INDEX UNIQ_AADB1B6D6C6E55B5 ON rarete');
        $this->addSql('DROP INDEX UNIQ_809A3D7D809A3D7D ON taux');
    }
}
