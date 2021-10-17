<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012101748 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000001", "BV Lean leather ankle boots", "boots", 89000)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000002", "BV Lean leather ankle boots", "boots", 99000)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000003", "Ashlington leather ankle boots", "boots", 71000)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000004", "Naima embellished suede sandals", "sandals", 79500)');
        $this->addSql('INSERT INTO product (sku, name, category, original_price) VALUES ("000005", "Nathane leather sneakers", "sneakers", 59000)');

    }

    public function down(Schema $schema) : void
    {

    }
}
