<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214132703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receveur DROP FOREIGN KEY FK_6160C427A76ED395');
        $this->addSql('DROP INDEX IDX_6160C427A76ED395 ON receveur');
        $this->addSql('ALTER TABLE receveur ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD code VARCHAR(255) NOT NULL, DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receveur ADD user_id INT NOT NULL, DROP nom, DROP prenom, DROP code');
        $this->addSql('ALTER TABLE receveur ADD CONSTRAINT FK_6160C427A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6160C427A76ED395 ON receveur (user_id)');
    }
}
