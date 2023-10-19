<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019103718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_category (movie_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_DABA824C8F93B6FC (movie_id), INDEX IDX_DABA824C12469DE2 (category_id), PRIMARY KEY(movie_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_category ADD CONSTRAINT FK_DABA824C8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_category ADD CONSTRAINT FK_DABA824C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD seance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E3797A94 FOREIGN KEY (seance_id) REFERENCES session (id)');
        $this->addSql('CREATE INDEX IDX_42C84955E3797A94 ON reservation (seance_id)');
        $this->addSql('ALTER TABLE session ADD film_id INT DEFAULT NULL, ADD salle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4567F5183 FOREIGN KEY (film_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4DC304035 FOREIGN KEY (salle_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4567F5183 ON session (film_id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4DC304035 ON session (salle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_category DROP FOREIGN KEY FK_DABA824C8F93B6FC');
        $this->addSql('ALTER TABLE movie_category DROP FOREIGN KEY FK_DABA824C12469DE2');
        $this->addSql('DROP TABLE movie_category');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E3797A94');
        $this->addSql('DROP INDEX IDX_42C84955E3797A94 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP seance_id');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4567F5183');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4DC304035');
        $this->addSql('DROP INDEX IDX_D044D5D4567F5183 ON session');
        $this->addSql('DROP INDEX IDX_D044D5D4DC304035 ON session');
        $this->addSql('ALTER TABLE session DROP film_id, DROP salle_id');
    }
}
