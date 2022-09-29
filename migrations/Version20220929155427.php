<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929155427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Nullable genre';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film CHANGE genre_id_id genre_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participant_role ADD id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film CHANGE genre_id_id genre_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE participant_role MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON participant_role');
        $this->addSql('ALTER TABLE participant_role DROP id');
    }
}
