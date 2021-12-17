<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216204155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY fk_tournoi');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY fk_tournoi');
        $this->addSql('ALTER TABLE equipe CHANGE nom nom VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15E09AC1C9 FOREIGN KEY (trn_id) REFERENCES tournoi (id)');
        $this->addSql('DROP INDEX fk_tournoi ON equipe');
        $this->addSql('CREATE INDEX IDX_2449BA15E09AC1C9 ON equipe (trn_id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT fk_tournoi FOREIGN KEY (trn_id) REFERENCES tournoi (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_gestionnaire');
        $this->addSql('ALTER TABLE evenement CHANGE nom nom VARCHAR(15) NOT NULL, CHANGE lieu lieu VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY fk_equipe');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY fk_equipe');
        $this->addSql('ALTER TABLE joueur CHANGE eqp_id eqp_id INT DEFAULT NULL, CHANGE niveau niveau VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5DF764A8B FOREIGN KEY (eqp_id) REFERENCES equipe (id)');
        $this->addSql('DROP INDEX fk_equipe ON joueur');
        $this->addSql('CREATE INDEX IDX_FD71A9C5DF764A8B ON joueur (eqp_id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT fk_equipe FOREIGN KEY (eqp_id) REFERENCES equipe (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_gest');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF40A4EC42 FOREIGN KEY (ev_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15E09AC1C9');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15E09AC1C9');
        $this->addSql('ALTER TABLE equipe CHANGE nom nom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT fk_tournoi FOREIGN KEY (trn_id) REFERENCES tournoi (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_2449ba15e09ac1c9 ON equipe');
        $this->addSql('CREATE INDEX fk_tournoi ON equipe (trn_id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15E09AC1C9 FOREIGN KEY (trn_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EA76ED395');
        $this->addSql('ALTER TABLE evenement CHANGE nom nom VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu lieu VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_gestionnaire FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5DF764A8B');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5DF764A8B');
        $this->addSql('ALTER TABLE joueur CHANGE eqp_id eqp_id INT NOT NULL, CHANGE niveau niveau VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT fk_equipe FOREIGN KEY (eqp_id) REFERENCES equipe (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_fd71a9c5df764a8b ON joueur');
        $this->addSql('CREATE INDEX fk_equipe ON joueur (eqp_id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5DF764A8B FOREIGN KEY (eqp_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF40A4EC42');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_gest FOREIGN KEY (ev_id) REFERENCES evenement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
