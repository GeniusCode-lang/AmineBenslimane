<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106161551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aimer DROP FOREIGN KEY aimer_ibfk_1');
        $this->addSql('ALTER TABLE aimer DROP FOREIGN KEY aimer_ibfk_2');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY film_ibfk_1');
        $this->addSql('ALTER TABLE film_acteurs DROP FOREIGN KEY film_acteurs_ibfk_1');
        $this->addSql('ALTER TABLE film_acteurs DROP FOREIGN KEY film_acteurs_ibfk_2');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY jouer_ibfk_2');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY jouer_ibfk_1');
        $this->addSql('ALTER TABLE utilisateurs_filmsfavoris DROP FOREIGN KEY utilisateurs_filmsfavoris_ibfk_1');
        $this->addSql('ALTER TABLE utilisateurs_filmsfavoris DROP FOREIGN KEY utilisateurs_filmsfavoris_ibfk_2');
        $this->addSql('DROP TABLE aimer');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_acteurs');
        $this->addSql('DROP TABLE jouer');
        $this->addSql('DROP TABLE realisateur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateurs_filmsfavoris');
        $this->addSql('ALTER TABLE acteur ADD id INT AUTO_INCREMENT NOT NULL, CHANGE acteur_id acteur_id INT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE role role VARCHAR(255) NOT NULL, CHANGE date_naissance date_naissance VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aimer (film_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX utilisateur_id (utilisateur_id), INDEX IDX_C2D0C6E8567F5183 (film_id), PRIMARY KEY(film_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE film (film_id INT AUTO_INCREMENT NOT NULL, realisateur_id INT DEFAULT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, duree INT NOT NULL, annee_sortie DATE NOT NULL, INDEX realisateur_id (realisateur_id), PRIMARY KEY(film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE film_acteurs (film_id INT NOT NULL, acteur_id INT NOT NULL, INDEX acteur_id (acteur_id), INDEX IDX_58E62E8F567F5183 (film_id), PRIMARY KEY(film_id, acteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jouer (film_id INT NOT NULL, acteur_id INT NOT NULL, INDEX acteur_id (acteur_id), INDEX IDX_825E5AED567F5183 (film_id), PRIMARY KEY(film_id, acteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE realisateur (realisateur_id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(realisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (utilisateur_id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, mot_de_passe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, role VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX email (email), PRIMARY KEY(utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateurs_filmsfavoris (utilisateur_id INT NOT NULL, film_id INT NOT NULL, INDEX film_id (film_id), INDEX IDX_5E4372D6FB88E14F (utilisateur_id), PRIMARY KEY(utilisateur_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE aimer ADD CONSTRAINT aimer_ibfk_1 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE aimer ADD CONSTRAINT aimer_ibfk_2 FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (utilisateur_id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT film_ibfk_1 FOREIGN KEY (realisateur_id) REFERENCES realisateur (realisateur_id)');
        $this->addSql('ALTER TABLE film_acteurs ADD CONSTRAINT film_acteurs_ibfk_1 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_acteurs ADD CONSTRAINT film_acteurs_ibfk_2 FOREIGN KEY (acteur_id) REFERENCES acteur (acteur_id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT jouer_ibfk_2 FOREIGN KEY (acteur_id) REFERENCES acteur (acteur_id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT jouer_ibfk_1 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE utilisateurs_filmsfavoris ADD CONSTRAINT utilisateurs_filmsfavoris_ibfk_1 FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateurs_filmsfavoris ADD CONSTRAINT utilisateurs_filmsfavoris_ibfk_2 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE acteur MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON acteur');
        $this->addSql('ALTER TABLE acteur DROP id, CHANGE acteur_id acteur_id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(100) NOT NULL, CHANGE prenom prenom VARCHAR(100) NOT NULL, CHANGE role role VARCHAR(50) DEFAULT NULL, CHANGE date_naissance date_naissance DATE NOT NULL');
        $this->addSql('ALTER TABLE acteur ADD PRIMARY KEY (acteur_id)');
    }
}
