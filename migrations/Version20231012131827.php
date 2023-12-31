<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012131827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_language (student_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_67503D2ECB944F1A (student_id), INDEX IDX_67503D2E82F1BAF4 (language_id), PRIMARY KEY(student_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_language ADD CONSTRAINT FK_67503D2ECB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_language ADD CONSTRAINT FK_67503D2E82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_language DROP FOREIGN KEY FK_67503D2ECB944F1A');
        $this->addSql('ALTER TABLE student_language DROP FOREIGN KEY FK_67503D2E82F1BAF4');
        $this->addSql('DROP TABLE student_language');
    }
}
