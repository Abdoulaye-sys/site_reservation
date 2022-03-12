<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211217151323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receveur ADD telephone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD colis_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554D268D70 FOREIGN KEY (colis_id) REFERENCES colis (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C849554D268D70 ON reservation (colis_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receveur DROP telephone');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554D268D70');
        $this->addSql('DROP INDEX UNIQ_42C849554D268D70 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP colis_id');
    }
}
