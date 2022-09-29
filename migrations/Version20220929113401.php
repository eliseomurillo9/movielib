<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929113401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Foreing key participant_role';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participant_role ADD film_id INT NOT NULL, ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE participant_role ADD CONSTRAINT FK_83DD9854567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE participant_role ADD CONSTRAINT FK_83DD9854217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_83DD9854567F5183 ON participant_role (film_id)');
        $this->addSql('CREATE INDEX IDX_83DD9854217BBB47 ON participant_role (person_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participant_role DROP FOREIGN KEY FK_83DD9854567F5183');
        $this->addSql('ALTER TABLE participant_role DROP FOREIGN KEY FK_83DD9854217BBB47');
        $this->addSql('DROP INDEX IDX_83DD9854567F5183 ON participant_role');
        $this->addSql('DROP INDEX IDX_83DD9854217BBB47 ON participant_role');
        $this->addSql('ALTER TABLE participant_role DROP film_id, DROP person_id');
    }
}
