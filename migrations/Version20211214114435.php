<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214114435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colis (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, poids VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expediteur (id INT AUTO_INCREMENT NOT NULL, reservation_id INT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_ABA4CF8EB83297E7 (reservation_id), INDEX IDX_ABA4CF8EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receveur (id INT AUTO_INCREMENT NOT NULL, reservation_id INT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_6160C427B83297E7 (reservation_id), INDEX IDX_6160C427A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expediteur ADD CONSTRAINT FK_ABA4CF8EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE expediteur ADD CONSTRAINT FK_ABA4CF8EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE receveur ADD CONSTRAINT FK_6160C427B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE receveur ADD CONSTRAINT FK_6160C427A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD started_date DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE colis');
        $this->addSql('DROP TABLE expediteur');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE receveur');
        $this->addSql('ALTER TABLE reservation DROP started_date');
    }
}
