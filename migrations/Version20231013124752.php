<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231013124752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assignment ADD start_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE formation ADD objective VARCHAR(191) NOT NULL, ADD cost DOUBLE PRECISION NOT NULL, DROP type, DROP description, DROP end_date');
        $this->addSql('ALTER TABLE lesson ADD title VARCHAR(191) NOT NULL, CHANGE exercices exercice LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE payment DROP amount');
        $this->addSql('ALTER TABLE quiz ADD title VARCHAR(191) NOT NULL, ADD question LONGTEXT NOT NULL, ADD answer LONGTEXT NOT NULL, DROP questions, DROP answers, CHANGE scores score INT NOT NULL');
        $this->addSql('ALTER TABLE resource CHANGE description content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE student DROP grades, DROP courses');
        $this->addSql('ALTER TABLE teacher ADD qualification VARCHAR(191) NOT NULL, ADD availability VARCHAR(191) NOT NULL, DROP qualifications, DROP availablility');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD description VARCHAR(191) NOT NULL, ADD end_date DATETIME NOT NULL, DROP cost, CHANGE objective type VARCHAR(191) NOT NULL');
        $this->addSql('ALTER TABLE quiz ADD questions LONGTEXT NOT NULL, ADD answers LONGTEXT NOT NULL, DROP title, DROP question, DROP answer, CHANGE score scores INT NOT NULL');
        $this->addSql('ALTER TABLE teacher ADD qualifications VARCHAR(191) NOT NULL, ADD availablility VARCHAR(191) NOT NULL, DROP qualification, DROP availability');
        $this->addSql('ALTER TABLE payment ADD amount DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE lesson DROP title, CHANGE exercice exercices LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE assignment DROP start_date');
        $this->addSql('ALTER TABLE resource CHANGE content description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE student ADD grades VARCHAR(191) DEFAULT NULL, ADD courses VARCHAR(191) DEFAULT NULL');
    }
}
