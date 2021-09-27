<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927164249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike ADD created_at DATETIME NOT NULL, ADD updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE bike_type ADD created_at DATETIME NOT NULL, ADD updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, DROP cost');
        $this->addSql('ALTER TABLE client ADD created_at DATETIME NOT NULL, ADD updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE point_client ADD created_at DATETIME NOT NULL, ADD updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE type_membership ADD created_at DATETIME NOT NULL, ADD updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE bike_type ADD cost INT NOT NULL, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE client DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE point_client DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE type_membership DROP created_at, DROP updated_at');
    }
}
