<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927162701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike_type ADD type_membership_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bike_type ADD CONSTRAINT FK_9D6950C56F5EE3F8 FOREIGN KEY (type_membership_id) REFERENCES type_membership (id)');
        $this->addSql('CREATE INDEX IDX_9D6950C56F5EE3F8 ON bike_type (type_membership_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike_type DROP FOREIGN KEY FK_9D6950C56F5EE3F8');
        $this->addSql('DROP INDEX IDX_9D6950C56F5EE3F8 ON bike_type');
        $this->addSql('ALTER TABLE bike_type DROP type_membership_id');
    }
}
