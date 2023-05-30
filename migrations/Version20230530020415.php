<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230530020415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C9F0BF009');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C526E8E58');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92CF0C17188');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C6EC1D6E1');
        $this->addSql('DROP INDEX IDX_B638C92C6EC1D6E1 ON gite');
        $this->addSql('DROP INDEX IDX_B638C92C9F0BF009 ON gite');
        $this->addSql('DROP INDEX IDX_B638C92CF0C17188 ON gite');
        $this->addSql('DROP INDEX IDX_B638C92C526E8E58 ON gite');
        $this->addSql('ALTER TABLE gite ADD ville_id INT DEFAULT NULL, ADD proprietaire_id INT DEFAULT NULL, ADD contact_id INT DEFAULT NULL, ADD prix_id INT DEFAULT NULL, DROP ville_id_id, DROP proprietaire_id_id, DROP contact_id_id, DROP prix_id_id');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92CA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92CE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C944722F2 FOREIGN KEY (prix_id) REFERENCES prix (id)');
        $this->addSql('CREATE INDEX IDX_B638C92CA73F0036 ON gite (ville_id)');
        $this->addSql('CREATE INDEX IDX_B638C92C76C50E4A ON gite (proprietaire_id)');
        $this->addSql('CREATE INDEX IDX_B638C92CE7A1254A ON gite (contact_id)');
        $this->addSql('CREATE INDEX IDX_B638C92C944722F2 ON gite (prix_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92CA73F0036');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C76C50E4A');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92CE7A1254A');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C944722F2');
        $this->addSql('DROP INDEX IDX_B638C92CA73F0036 ON gite');
        $this->addSql('DROP INDEX IDX_B638C92C76C50E4A ON gite');
        $this->addSql('DROP INDEX IDX_B638C92CE7A1254A ON gite');
        $this->addSql('DROP INDEX IDX_B638C92C944722F2 ON gite');
        $this->addSql('ALTER TABLE gite ADD ville_id_id INT DEFAULT NULL, ADD proprietaire_id_id INT DEFAULT NULL, ADD contact_id_id INT DEFAULT NULL, ADD prix_id_id INT DEFAULT NULL, DROP ville_id, DROP proprietaire_id, DROP contact_id, DROP prix_id');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C9F0BF009 FOREIGN KEY (prix_id_id) REFERENCES prix (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92CF0C17188 FOREIGN KEY (ville_id_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C6EC1D6E1 FOREIGN KEY (proprietaire_id_id) REFERENCES proprietaire (id)');
        $this->addSql('CREATE INDEX IDX_B638C92C6EC1D6E1 ON gite (proprietaire_id_id)');
        $this->addSql('CREATE INDEX IDX_B638C92C9F0BF009 ON gite (prix_id_id)');
        $this->addSql('CREATE INDEX IDX_B638C92CF0C17188 ON gite (ville_id_id)');
        $this->addSql('CREATE INDEX IDX_B638C92C526E8E58 ON gite (contact_id_id)');
    }
}
