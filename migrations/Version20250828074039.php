<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250828074039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_slots DROP INDEX UNIQ_8D06D4AC1FDCE57C, ADD INDEX IDX_8D06D4AC1FDCE57C (workshop_id)');
        $this->addSql('ALTER TABLE time_slots DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_slots DROP INDEX IDX_8D06D4AC1FDCE57C, ADD UNIQUE INDEX UNIQ_8D06D4AC1FDCE57C (workshop_id)');
        $this->addSql('ALTER TABLE time_slots ADD name VARCHAR(255) NOT NULL');
    }
}
