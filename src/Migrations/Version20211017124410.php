<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211017124410 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000001", "BV Lean leather ankle boots", "boots", 89000)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000002", "BV Lean leather ankle boots", "boots", 99000)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000003", "Ashlington leather ankle boots", "boots", 71000)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000004", "Naima embellished suede sandals", "sandals", 79500)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000005", "Nathane leather sneakers", "sneakers", 59000)');

        //Discounts are now added by migration. Ideally they could be added with a command or API by entering just the reference to the item or category and the amount
        $this->addSql('INSERT INTO discount (sku, percentage, start_date, end_date) VALUES ("000001", 30, "2020-01-01", "2040-01-01")');
        $this->addSql('INSERT INTO discount (sku, percentage, start_date, end_date) VALUES ("000002", 30, "2020-01-01", "2040-01-01")');
        $this->addSql('INSERT INTO discount (sku, percentage, start_date, end_date) VALUES ("000003", 30, "2020-01-01", "2040-01-01")');
        $this->addSql('INSERT INTO discount (sku, percentage, start_date, end_date) VALUES ("000003", 15, "2020-01-01", "2040-01-01")');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DELETE FROM product');
        $this->addSql('DELETE FROM discount');
    }
}
