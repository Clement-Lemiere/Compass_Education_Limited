<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012123704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assignment_lesson (assignment_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_C05554EED19302F8 (assignment_id), INDEX IDX_C05554EECDF80196 (lesson_id), PRIMARY KEY(assignment_id, lesson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assignment_lesson ADD CONSTRAINT FK_C05554EED19302F8 FOREIGN KEY (assignment_id) REFERENCES assignment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE assignment_lesson ADD CONSTRAINT FK_C05554EECDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assignment_lesson DROP FOREIGN KEY FK_C05554EED19302F8');
        $this->addSql('ALTER TABLE assignment_lesson DROP FOREIGN KEY FK_C05554EECDF80196');
        $this->addSql('DROP TABLE assignment_lesson');
    }
}
