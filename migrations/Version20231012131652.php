<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012131652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE teacher_language (teacher_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_D5CDC23E41807E1D (teacher_id), INDEX IDX_D5CDC23E82F1BAF4 (language_id), PRIMARY KEY(teacher_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teacher_language ADD CONSTRAINT FK_D5CDC23E41807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teacher_language ADD CONSTRAINT FK_D5CDC23E82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher_language DROP FOREIGN KEY FK_D5CDC23E41807E1D');
        $this->addSql('ALTER TABLE teacher_language DROP FOREIGN KEY FK_D5CDC23E82F1BAF4');
        $this->addSql('DROP TABLE teacher_language');
    }
}
