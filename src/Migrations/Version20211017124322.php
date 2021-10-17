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
    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE product (sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, original_price INT NOT NULL, PRIMARY KEY(sku))');
        $this->addSql('CREATE TABLE discount (id INT AUTO_INCREMENT, sku VARCHAR(255) NOT NULL, percentage INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, PRIMARY KEY(id), FOREIGN KEY (sku) REFERENCES product (sku))');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE discount');
        $this->addSql('DROP TABLE product');
    }
}
