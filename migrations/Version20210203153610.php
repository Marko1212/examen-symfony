<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203153610 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, тname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_stagiaire (competence_id INT NOT NULL, stagiaire_id INT NOT NULL, INDEX IDX_7BD7814C15761DAB (competence_id), INDEX IDX_7BD7814CBBA93DD6 (stagiaire_id), PRIMARY KEY(competence_id, stagiaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagiaire (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, birthday DATE NOT NULL, postal_code VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence_stagiaire ADD CONSTRAINT FK_7BD7814C15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_stagiaire ADD CONSTRAINT FK_7BD7814CBBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence_stagiaire DROP FOREIGN KEY FK_7BD7814C15761DAB');
        $this->addSql('ALTER TABLE competence_stagiaire DROP FOREIGN KEY FK_7BD7814CBBA93DD6');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE competence_stagiaire');
        $this->addSql('DROP TABLE stagiaire');
    }
}
