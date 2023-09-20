<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920091305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, job_offer_id INT DEFAULT NULL, INDEX IDX_E33BD3B8A76ED395 (user_id), INDEX IDX_E33BD3B83481D195 (job_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, job_offer_id INT DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, activity_type VARCHAR(255) DEFAULT NULL, contact_name VARCHAR(255) DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, contact_number VARCHAR(255) DEFAULT NULL, contact_email VARCHAR(255) DEFAULT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_C74404553481D195 (job_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, activity TINYINT(1) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, job_title VARCHAR(255) DEFAULT NULL, job_type VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, job_category VARCHAR(255) DEFAULT NULL, closing_date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', salary INT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8A76ED395 FOREIGN KEY (user_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B83481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404553481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8A76ED395');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B83481D195');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404553481D195');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE job_offer');
    }
}
