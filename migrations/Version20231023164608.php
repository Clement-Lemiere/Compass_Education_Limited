<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023164608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session ADD student_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4CB944F1A ON session (student_id)');
        $this->addSql('ALTER TABLE session RENAME INDEX idx_d499bff641807e1d TO IDX_D044D5D441807E1D');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4CB944F1A');
        $this->addSql('DROP INDEX IDX_D044D5D4CB944F1A ON session');
        $this->addSql('ALTER TABLE session DROP student_id');
        $this->addSql('ALTER TABLE session RENAME INDEX idx_d044d5d441807e1d TO IDX_D499BFF641807E1D');
    }
}
