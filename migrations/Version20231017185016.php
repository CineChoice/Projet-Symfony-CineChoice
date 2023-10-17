<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017185016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, nb_billets_r INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film ADD seance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('CREATE INDEX IDX_8244BE22E3797A94 ON film (seance_id)');
        $this->addSql('ALTER TABLE salle ADD seance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CE3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('CREATE INDEX IDX_4E977E5CE3797A94 ON salle (seance_id)');
        $this->addSql('ALTER TABLE seance ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EB83297E7 ON seance (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EB83297E7');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22E3797A94');
        $this->addSql('DROP INDEX IDX_8244BE22E3797A94 ON film');
        $this->addSql('ALTER TABLE film DROP seance_id');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CE3797A94');
        $this->addSql('DROP INDEX IDX_4E977E5CE3797A94 ON salle');
        $this->addSql('ALTER TABLE salle DROP seance_id');
        $this->addSql('DROP INDEX IDX_DF7DFD0EB83297E7 ON seance');
        $this->addSql('ALTER TABLE seance DROP reservation_id');
    }
}
