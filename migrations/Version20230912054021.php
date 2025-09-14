<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912054021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boss_ingredient (id INTEGER NOT NULL, level_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_D0ABB6E05FB14BA7 FOREIGN KEY (level_id) REFERENCES ingredient_level (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D0ABB6E0BF396750 FOREIGN KEY (id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_D0ABB6E05FB14BA7 ON boss_ingredient (level_id)');
        $this->addSql('CREATE TABLE campagne (id INTEGER NOT NULL, numero INTEGER NOT NULL, difficile BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_539B5D16F55AE19E10CEE60C ON campagne (numero, difficile)');
        $this->addSql('CREATE TABLE classe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F87BF966C6E55B5 ON classe (nom)');
        $this->addSql('CREATE TABLE crystal (id INTEGER NOT NULL, nature_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_878A1F193BCB2E4B FOREIGN KEY (nature_id) REFERENCES element (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_878A1F19BF396750 FOREIGN KEY (id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_878A1F193BCB2E4B ON crystal (nature_id)');
        $this->addSql('CREATE TABLE element (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_41405E396C6E55B5 ON element (nom)');
        $this->addSql('CREATE TABLE emplacement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0CF65F66C6E55B5 ON emplacement (nom)');
        $this->addSql('CREATE TABLE etape (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, campagne_id INTEGER NOT NULL, numero INTEGER NOT NULL, boss BOOLEAN NOT NULL, energie INTEGER DEFAULT NULL, experience INTEGER DEFAULT NULL, exp_maiden INTEGER DEFAULT NULL, coins INTEGER DEFAULT NULL, min_gacha_orbs INTEGER DEFAULT NULL, max_gacha_orbs INTEGER DEFAULT NULL, CONSTRAINT FK_285F75DD16227374 FOREIGN KEY (campagne_id) REFERENCES campagne (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_285F75DD16227374 ON etape (campagne_id)');
        $this->addSql('CREATE TABLE etape_adversaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, element_id INTEGER DEFAULT NULL, classe_id INTEGER DEFAULT NULL, etape_id INTEGER DEFAULT NULL, quantity INTEGER NOT NULL, CONSTRAINT FK_43DC18261F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_43DC18268F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_43DC18264A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_43DC18261F1F2A24 ON etape_adversaire (element_id)');
        $this->addSql('CREATE INDEX IDX_43DC18268F5EA509 ON etape_adversaire (classe_id)');
        $this->addSql('CREATE INDEX IDX_43DC18264A8CA2AD ON etape_adversaire (etape_id)');
        $this->addSql('CREATE TABLE etape_crystal (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, crystal_id INTEGER NOT NULL, etape_id INTEGER DEFAULT NULL, minimum INTEGER DEFAULT NULL, maximum INTEGER DEFAULT NULL, CONSTRAINT FK_DCE3BCC2B58139E8 FOREIGN KEY (crystal_id) REFERENCES crystal (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DCE3BCC24A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_DCE3BCC2B58139E8 ON etape_crystal (crystal_id)');
        $this->addSql('CREATE INDEX IDX_DCE3BCC24A8CA2AD ON etape_crystal (etape_id)');
        $this->addSql('CREATE TABLE etape_fragment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, maiden_id INTEGER NOT NULL, etape_id INTEGER DEFAULT NULL, minimum INTEGER DEFAULT NULL, maximum INTEGER DEFAULT NULL, CONSTRAINT FK_DAF77713C904F22D FOREIGN KEY (maiden_id) REFERENCES maiden (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DAF777134A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_DAF77713C904F22D ON etape_fragment (maiden_id)');
        $this->addSql('CREATE INDEX IDX_DAF777134A8CA2AD ON etape_fragment (etape_id)');
        $this->addSql('CREATE TABLE etape_item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, etape_id INTEGER NOT NULL, item_id INTEGER NOT NULL, rarity_id INTEGER DEFAULT NULL, taux NUMERIC(10, 2) DEFAULT NULL, CONSTRAINT FK_550779644A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_55077964126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_55077964F3747573 FOREIGN KEY (rarity_id) REFERENCES rarete (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_550779644A8CA2AD ON etape_item (etape_id)');
        $this->addSql('CREATE INDEX IDX_55077964126F525E ON etape_item (item_id)');
        $this->addSql('CREATE INDEX IDX_55077964F3747573 ON etape_item (rarity_id)');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, level INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE ingredient_constituant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ingredient_id INTEGER DEFAULT NULL, constituant_id INTEGER DEFAULT NULL, quantity INTEGER DEFAULT NULL, CONSTRAINT FK_E3CF2E4933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E3CF2E4AFF81B7B FOREIGN KEY (constituant_id) REFERENCES ingredient (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_E3CF2E4933FE08C ON ingredient_constituant (ingredient_id)');
        $this->addSql('CREATE INDEX IDX_E3CF2E4AFF81B7B ON ingredient_constituant (constituant_id)');
        $this->addSql('CREATE TABLE ingredient_level (id INTEGER NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE item (id INTEGER NOT NULL, classe_id INTEGER DEFAULT NULL, emplacement_id INTEGER DEFAULT NULL, maiden_id INTEGER DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_1F1B251E8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1F1B251EC4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacement (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1F1B251EC904F22D FOREIGN KEY (maiden_id) REFERENCES maiden (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1F1B251EBF396750 FOREIGN KEY (id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1F1B251E8F5EA509 ON item (classe_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251EC4598A51 ON item (emplacement_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251EC904F22D ON item (maiden_id)');
        $this->addSql('CREATE TABLE maiden (id INTEGER NOT NULL, classe_id INTEGER NOT NULL, element_id INTEGER NOT NULL, rarity_id INTEGER NOT NULL, nickname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_1A8AEB128F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1A8AEB121F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1A8AEB12F3747573 FOREIGN KEY (rarity_id) REFERENCES rarete (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1A8AEB12BF396750 FOREIGN KEY (id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1A8AEB128F5EA509 ON maiden (classe_id)');
        $this->addSql('CREATE INDEX IDX_1A8AEB121F1F2A24 ON maiden (element_id)');
        $this->addSql('CREATE INDEX IDX_1A8AEB12F3747573 ON maiden (rarity_id)');
        $this->addSql('CREATE TABLE rarete (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AADB1B6D6C6E55B5 ON rarete (nom)');
        $this->addSql('CREATE TABLE session (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, player_name VARCHAR(50) NOT NULL, server_name VARCHAR(50) NOT NULL, bonus_coins INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, is_verified BOOLEAN NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE boss_ingredient');
        $this->addSql('DROP TABLE campagne');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE crystal');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE emplacement');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE etape_adversaire');
        $this->addSql('DROP TABLE etape_crystal');
        $this->addSql('DROP TABLE etape_fragment');
        $this->addSql('DROP TABLE etape_item');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE ingredient_constituant');
        $this->addSql('DROP TABLE ingredient_level');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE maiden');
        $this->addSql('DROP TABLE rarete');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE user');
    }
}
