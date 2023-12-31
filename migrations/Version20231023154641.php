<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023154641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_assignment (student_id INT NOT NULL, assignment_id INT NOT NULL, INDEX IDX_DD1AA95BCB944F1A (student_id), INDEX IDX_DD1AA95BD19302F8 (assignment_id), PRIMARY KEY(student_id, assignment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_assignment ADD CONSTRAINT FK_DD1AA95BCB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_assignment ADD CONSTRAINT FK_DD1AA95BD19302F8 FOREIGN KEY (assignment_id) REFERENCES assignment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_assignment DROP FOREIGN KEY FK_DD1AA95BCB944F1A');
        $this->addSql('ALTER TABLE student_assignment DROP FOREIGN KEY FK_DD1AA95BD19302F8');
        $this->addSql('DROP TABLE student_assignment');
    }
}
