<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927151631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bike (id INT AUTO_INCREMENT NOT NULL, bike_type_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, day INT NOT NULL, INDEX IDX_4CBC37807FF015AE (bike_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bike_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point_client (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, point INT NOT NULL, INDEX IDX_AEE1F32B19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_membership (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, cost VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC37807FF015AE FOREIGN KEY (bike_type_id) REFERENCES bike_type (id)');
        $this->addSql('ALTER TABLE point_client ADD CONSTRAINT FK_AEE1F32B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC37807FF015AE');
        $this->addSql('ALTER TABLE point_client DROP FOREIGN KEY FK_AEE1F32B19EB6921');
        $this->addSql('DROP TABLE bike');
        $this->addSql('DROP TABLE bike_type');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE point_client');
        $this->addSql('DROP TABLE type_membership');
    }
}
