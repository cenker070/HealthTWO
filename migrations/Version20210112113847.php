<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210112113847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE health_one (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health_one_health_one (health_one_source INT NOT NULL, health_one_target INT NOT NULL, INDEX IDX_1D38196FEA29F02F (health_one_source), INDEX IDX_1D38196FF3CCA0A0 (health_one_target), PRIMARY KEY(health_one_source, health_one_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicijn (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, werking VARCHAR(255) NOT NULL, bijwerkingen VARCHAR(255) NOT NULL, prijs NUMERIC(5, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE health_one_health_one ADD CONSTRAINT FK_1D38196FEA29F02F FOREIGN KEY (health_one_source) REFERENCES health_one (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE health_one_health_one ADD CONSTRAINT FK_1D38196FF3CCA0A0 FOREIGN KEY (health_one_target) REFERENCES health_one (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE medicijnen');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE health_one_health_one DROP FOREIGN KEY FK_1D38196FEA29F02F');
        $this->addSql('ALTER TABLE health_one_health_one DROP FOREIGN KEY FK_1D38196FF3CCA0A0');
        $this->addSql('CREATE TABLE medicijnen (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, bijwerkingen VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, effect VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE health_one');
        $this->addSql('DROP TABLE health_one_health_one');
        $this->addSql('DROP TABLE medicijn');
    }
}
