<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220622143945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD forfait_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27906D5F2C FOREIGN KEY (forfait_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27906D5F2C ON produit (forfait_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27906D5F2C');
        $this->addSql('DROP INDEX IDX_29A5EC27906D5F2C ON produit');
        $this->addSql('ALTER TABLE produit DROP forfait_id');
    }
}
