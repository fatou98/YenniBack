<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180627142516 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE prise_derendezvous (id INT AUTO_INCREMENT NOT NULL, specialite_stucture_id INT NOT NULL, nom_complet VARCHAR(50) NOT NULL, telephone INT NOT NULL, adresse_mail VARCHAR(50) NOT NULL, datenaiss DATE NOT NULL, specialite VARCHAR(50) NOT NULL, daterv DATETIME NOT NULL, motif VARCHAR(255) NOT NULL, INDEX IDX_E2A3ABEE58AA81CE (specialite_stucture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, nomspecialite VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite_stucture (id INT AUTO_INCREMENT NOT NULL, specialite_id INT NOT NULL, structure_id INT NOT NULL, INDEX IDX_A6FB71352195E0F0 (specialite_id), INDEX IDX_A6FB71352534008B (structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure (id INT AUTO_INCREMENT NOT NULL, type_structure_id INT NOT NULL, nom_structure VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, tel INT NOT NULL, INDEX IDX_6F0137EAA277BA8E (type_structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_structure (id INT AUTO_INCREMENT NOT NULL, nom_type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(50) NOT NULL, numpiece INT NOT NULL, tel INT NOT NULL, adresse VARCHAR(255) NOT NULL, password VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prise_derendezvous ADD CONSTRAINT FK_E2A3ABEE58AA81CE FOREIGN KEY (specialite_stucture_id) REFERENCES specialite_stucture (id)');
        $this->addSql('ALTER TABLE specialite_stucture ADD CONSTRAINT FK_A6FB71352195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE specialite_stucture ADD CONSTRAINT FK_A6FB71352534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EAA277BA8E FOREIGN KEY (type_structure_id) REFERENCES type_structure (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE specialite_stucture DROP FOREIGN KEY FK_A6FB71352195E0F0');
        $this->addSql('ALTER TABLE prise_derendezvous DROP FOREIGN KEY FK_E2A3ABEE58AA81CE');
        $this->addSql('ALTER TABLE specialite_stucture DROP FOREIGN KEY FK_A6FB71352534008B');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EAA277BA8E');
        $this->addSql('DROP TABLE prise_derendezvous');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE specialite_stucture');
        $this->addSql('DROP TABLE structure');
        $this->addSql('DROP TABLE type_structure');
        $this->addSql('DROP TABLE user');
    }
}
