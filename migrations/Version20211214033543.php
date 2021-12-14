<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214033543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY fk_tournoi');
        $this->addSql('DROP INDEX fk_tournoi ON equipe');
        $this->addSql('ALTER TABLE equipe ADD id INT AUTO_INCREMENT NOT NULL, DROP tournoi_id, CHANGE equipe_id equipe_id INT NOT NULL, CHANGE nom nom VARCHAR(15) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_gestionnaire');
        $this->addSql('ALTER TABLE evenement CHANGE nom nom VARCHAR(15) NOT NULL, CHANGE lieu lieu VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY fk_equipe');
        $this->addSql('DROP INDEX fk_equipe ON joueur');
        $this->addSql('ALTER TABLE joueur ADD id INT AUTO_INCREMENT NOT NULL, DROP nom, CHANGE joueur_id joueur_id INT NOT NULL, CHANGE niveau niveau VARCHAR(15) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_gest');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF40A4EC42 FOREIGN KEY (ev_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE equipe DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE equipe ADD tournoi_id INT NOT NULL, DROP id, CHANGE equipe_id equipe_id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT fk_tournoi FOREIGN KEY (tournoi_id) REFERENCES tournoi (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_tournoi ON equipe (tournoi_id)');
        $this->addSql('ALTER TABLE equipe ADD PRIMARY KEY (equipe_id)');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EA76ED395');
        $this->addSql('ALTER TABLE evenement CHANGE nom nom VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu lieu VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_gestionnaire FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE joueur DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE joueur ADD nom VARCHAR(15) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, DROP id, CHANGE joueur_id joueur_id INT AUTO_INCREMENT NOT NULL, CHANGE niveau niveau VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT fk_equipe FOREIGN KEY (equipe_id) REFERENCES equipe (equipe_id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_equipe ON joueur (equipe_id)');
        $this->addSql('ALTER TABLE joueur ADD PRIMARY KEY (joueur_id)');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF40A4EC42');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_gest FOREIGN KEY (ev_id) REFERENCES evenement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
