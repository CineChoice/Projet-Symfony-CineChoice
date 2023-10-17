<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017183039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film_categorie DROP FOREIGN KEY FK_7DB18807BCF5E72D');
        $this->addSql('ALTER TABLE film_categorie DROP FOREIGN KEY FK_7DB18807567F5183');
        $this->addSql('DROP TABLE film_categorie');
        $this->addSql('ALTER TABLE film CHANGE date_sortie_film date_sortie_film INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film_categorie (film_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_7DB18807567F5183 (film_id), INDEX IDX_7DB18807BCF5E72D (categorie_id), PRIMARY KEY(film_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE film_categorie ADD CONSTRAINT FK_7DB18807BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_categorie ADD CONSTRAINT FK_7DB18807567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film CHANGE date_sortie_film date_sortie_film DATE NOT NULL');
    }
}
