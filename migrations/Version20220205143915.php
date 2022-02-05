<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220205143915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add verification of user';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE element CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE emplacement CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ingredient CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ingredient_level CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE item CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE maiden CHANGE nickname nickname VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rarete CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE session CHANGE player_name player_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE server_name server_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP is_verified, CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
