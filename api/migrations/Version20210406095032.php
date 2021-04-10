<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406095032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, musee_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, historique VARCHAR(2500) DEFAULT NULL, horaire_ouverture TIME DEFAULT NULL, horaire_fermeture TIME DEFAULT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, citation VARCHAR(2500) DEFAULT NULL, auteur_citation VARCHAR(255) DEFAULT NULL, jour_fermeture VARCHAR(2500) DEFAULT NULL, nb_personne_max INT DEFAULT NULL, est_visitable TINYINT(1) NOT NULL, longueur DOUBLE PRECISION DEFAULT NULL, largeur DOUBLE PRECISION DEFAULT NULL, annee_construction INT DEFAULT NULL, INDEX IDX_A664B05AD90009CE (musee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musee (id INT AUTO_INCREMENT NOT NULL, horaire_ouverture TIME NOT NULL, horaire_fermeture TIME NOT NULL, jour_fermeture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, nb_personne INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date DATE NOT NULL, horaire TIME NOT NULL, tel_cli VARCHAR(255) NOT NULL, INDEX IDX_42C84955A9706509 (bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau ADD CONSTRAINT FK_A664B05AD90009CE FOREIGN KEY (musee_id) REFERENCES musee (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A9706509');
        $this->addSql('ALTER TABLE bateau DROP FOREIGN KEY FK_A664B05AD90009CE');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE musee');
        $this->addSql('DROP TABLE reservation');
    }
}
