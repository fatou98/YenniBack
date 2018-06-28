<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180628192736 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prise_derendezvous DROP FOREIGN KEY FK_E2A3ABEE58AA81CE');
        $this->addSql('DROP INDEX IDX_E2A3ABEE58AA81CE ON prise_derendezvous');
        $this->addSql('ALTER TABLE prise_derendezvous DROP specialite, CHANGE daterv daterv DATE NOT NULL, CHANGE specialite_stucture_id specialite_id INT NOT NULL');
        $this->addSql('ALTER TABLE prise_derendezvous ADD CONSTRAINT FK_E2A3ABEE2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_E2A3ABEE2195E0F0 ON prise_derendezvous (specialite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prise_derendezvous DROP FOREIGN KEY FK_E2A3ABEE2195E0F0');
        $this->addSql('DROP INDEX IDX_E2A3ABEE2195E0F0 ON prise_derendezvous');
        $this->addSql('ALTER TABLE prise_derendezvous ADD specialite VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE daterv daterv DATETIME NOT NULL, CHANGE specialite_id specialite_stucture_id INT NOT NULL');
        $this->addSql('ALTER TABLE prise_derendezvous ADD CONSTRAINT FK_E2A3ABEE58AA81CE FOREIGN KEY (specialite_stucture_id) REFERENCES specialite_stucture (id)');
        $this->addSql('CREATE INDEX IDX_E2A3ABEE58AA81CE ON prise_derendezvous (specialite_stucture_id)');
    }
}
