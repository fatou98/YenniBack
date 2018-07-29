<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180729223953 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, nomcomplet VARCHAR(30) NOT NULL, numpiece INT NOT NULL, adresse VARCHAR(255) NOT NULL, tel INT NOT NULL, password VARCHAR(64) NOT NULL, is_active TINYINT(1) NOT NULL, roles VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), UNIQUE INDEX UNIQ_C7440455289172D6 (numpiece), UNIQUE INDEX UNIQ_C7440455F037AB0F (tel), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE had (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, adresse VARCHAR(50) NOT NULL, tel INT NOT NULL, motif VARCHAR(255) NOT NULL, INDEX IDX_8FBCBC2D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, nom_complet VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, tel INT NOT NULL, ordonnance LONGBLOB NOT NULL, INDEX IDX_A60C9F1F19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordonnance (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, fichier LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vsl (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, nom_complet VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, tel INT NOT NULL, fichemaladie LONGBLOB NOT NULL, INDEX IDX_EF2BCAB619EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE had ADD CONSTRAINT FK_8FBCBC2D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE vsl ADD CONSTRAINT FK_EF2BCAB619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE prise_derendezvous ADD client_id INT NOT NULL, DROP nom_complet, DROP adresse_mail, DROP datenaiss, CHANGE telephone structure_id INT NOT NULL');
        $this->addSql('ALTER TABLE prise_derendezvous ADD CONSTRAINT FK_E2A3ABEE2534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE prise_derendezvous ADD CONSTRAINT FK_E2A3ABEE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_E2A3ABEE2534008B ON prise_derendezvous (structure_id)');
        $this->addSql('CREATE INDEX IDX_E2A3ABEE19EB6921 ON prise_derendezvous (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE had DROP FOREIGN KEY FK_8FBCBC2D19EB6921');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F19EB6921');
        $this->addSql('ALTER TABLE prise_derendezvous DROP FOREIGN KEY FK_E2A3ABEE19EB6921');
        $this->addSql('ALTER TABLE vsl DROP FOREIGN KEY FK_EF2BCAB619EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE had');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE ordonnance');
        $this->addSql('DROP TABLE vsl');
        $this->addSql('ALTER TABLE prise_derendezvous DROP FOREIGN KEY FK_E2A3ABEE2534008B');
        $this->addSql('DROP INDEX IDX_E2A3ABEE2534008B ON prise_derendezvous');
        $this->addSql('DROP INDEX IDX_E2A3ABEE19EB6921 ON prise_derendezvous');
        $this->addSql('ALTER TABLE prise_derendezvous ADD nom_complet VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD telephone INT NOT NULL, ADD adresse_mail VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD datenaiss DATE NOT NULL, DROP structure_id, DROP client_id');
    }
}
