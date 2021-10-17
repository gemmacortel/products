<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211017124322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE discount (id INT AUTO_INCREMENT NOT NULL, sku VARCHAR(255) DEFAULT NULL, percentage INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_E1E0B40EF9038C4 (sku), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, original_price INT NOT NULL, PRIMARY KEY(sku)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discount ADD CONSTRAINT FK_E1E0B40EF9038C4 FOREIGN KEY (sku) REFERENCES product (sku)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE discount DROP FOREIGN KEY FK_E1E0B40EF9038C4');
        $this->addSql('DROP TABLE discount');
        $this->addSql('DROP TABLE product');
    }
}
