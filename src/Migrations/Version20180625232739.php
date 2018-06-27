<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180625232739 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE specialite_stucture DROP nom_specialitestruct');
        $this->addSql('ALTER TABLE structure ADD type_structure_id INT NOT NULL');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EAA277BA8E FOREIGN KEY (type_structure_id) REFERENCES type_structure (id)');
        $this->addSql('CREATE INDEX IDX_6F0137EAA277BA8E ON structure (type_structure_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE specialite_stucture ADD nom_specialitestruct VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EAA277BA8E');
        $this->addSql('DROP INDEX IDX_6F0137EAA277BA8E ON structure');
        $this->addSql('ALTER TABLE structure DROP type_structure_id');
    }
}
