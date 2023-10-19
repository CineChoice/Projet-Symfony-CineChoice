<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019102651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, affiche VARCHAR(255) NOT NULL, date INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, capaciter INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, heure VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22E3797A94');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CE3797A94');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EB83297E7');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE seance');
        $this->addSql('ALTER TABLE reservation CHANGE nb_billets_r nb_billet INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_cat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, desc_cat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, seance_id INT DEFAULT NULL, titre_film VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, desc_film VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, affiche_film VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_sortie_film INT NOT NULL, INDEX IDX_8244BE22E3797A94 (seance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, seance_id INT DEFAULT NULL, nom_salle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cap_salle INT NOT NULL, INDEX IDX_4E977E5CE3797A94 (seance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, date_seance DATE NOT NULL, heure_deb_seance TIME NOT NULL, INDEX IDX_DF7DFD0EB83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CE3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE session');
        $this->addSql('ALTER TABLE reservation CHANGE nb_billet nb_billets_r INT NOT NULL');
    }
}
