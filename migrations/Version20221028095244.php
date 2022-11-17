<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028095244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F55B127A4 FOREIGN KEY (added_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F55B127A4 ON movie (added_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F55B127A4');
        $this->addSql('DROP INDEX IDX_1D5EF26F55B127A4 ON movie');
    }
}
