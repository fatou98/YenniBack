<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180625234916 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE specialite_stucture_specialite');
        $this->addSql('DROP TABLE specialite_stucture_structure');
        $this->addSql('ALTER TABLE prise_derendezvous ADD specialite_stucture_id INT NOT NULL');
        $this->addSql('ALTER TABLE prise_derendezvous ADD CONSTRAINT FK_E2A3ABEE58AA81CE FOREIGN KEY (specialite_stucture_id) REFERENCES specialite_stucture (id)');
        $this->addSql('CREATE INDEX IDX_E2A3ABEE58AA81CE ON prise_derendezvous (specialite_stucture_id)');
        $this->addSql('ALTER TABLE specialite_stucture DROP FOREIGN KEY FK_A6FB7135C711AF08');
        $this->addSql('DROP INDEX IDX_A6FB7135C711AF08 ON specialite_stucture');
        $this->addSql('ALTER TABLE specialite_stucture ADD structure_id INT NOT NULL, CHANGE prise_derendezvous_id specialite_id INT NOT NULL');
        $this->addSql('ALTER TABLE specialite_stucture ADD CONSTRAINT FK_A6FB71352195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE specialite_stucture ADD CONSTRAINT FK_A6FB71352534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('CREATE INDEX IDX_A6FB71352195E0F0 ON specialite_stucture (specialite_id)');
        $this->addSql('CREATE INDEX IDX_A6FB71352534008B ON specialite_stucture (structure_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE specialite_stucture_specialite (specialite_stucture_id INT NOT NULL, specialite_id INT NOT NULL, INDEX IDX_BCAAB60D58AA81CE (specialite_stucture_id), INDEX IDX_BCAAB60D2195E0F0 (specialite_id), PRIMARY KEY(specialite_stucture_id, specialite_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite_stucture_structure (specialite_stucture_id INT NOT NULL, structure_id INT NOT NULL, INDEX IDX_CDE5E65558AA81CE (specialite_stucture_id), INDEX IDX_CDE5E6552534008B (structure_id), PRIMARY KEY(specialite_stucture_id, structure_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialite_stucture_specialite ADD CONSTRAINT FK_BCAAB60D2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_stucture_specialite ADD CONSTRAINT FK_BCAAB60D58AA81CE FOREIGN KEY (specialite_stucture_id) REFERENCES specialite_stucture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_stucture_structure ADD CONSTRAINT FK_CDE5E6552534008B FOREIGN KEY (structure_id) REFERENCES structure (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_stucture_structure ADD CONSTRAINT FK_CDE5E65558AA81CE FOREIGN KEY (specialite_stucture_id) REFERENCES specialite_stucture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prise_derendezvous DROP FOREIGN KEY FK_E2A3ABEE58AA81CE');
        $this->addSql('DROP INDEX IDX_E2A3ABEE58AA81CE ON prise_derendezvous');
        $this->addSql('ALTER TABLE prise_derendezvous DROP specialite_stucture_id');
        $this->addSql('ALTER TABLE specialite_stucture DROP FOREIGN KEY FK_A6FB71352195E0F0');
        $this->addSql('ALTER TABLE specialite_stucture DROP FOREIGN KEY FK_A6FB71352534008B');
        $this->addSql('DROP INDEX IDX_A6FB71352195E0F0 ON specialite_stucture');
        $this->addSql('DROP INDEX IDX_A6FB71352534008B ON specialite_stucture');
        $this->addSql('ALTER TABLE specialite_stucture ADD prise_derendezvous_id INT NOT NULL, DROP specialite_id, DROP structure_id');
        $this->addSql('ALTER TABLE specialite_stucture ADD CONSTRAINT FK_A6FB7135C711AF08 FOREIGN KEY (prise_derendezvous_id) REFERENCES prise_derendezvous (id)');
        $this->addSql('CREATE INDEX IDX_A6FB7135C711AF08 ON specialite_stucture (prise_derendezvous_id)');
    }
}
