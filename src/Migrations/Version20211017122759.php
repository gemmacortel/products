<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211017122759 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        //Discounts are now added by migration. Ideally they could be added with a command or API by entering just the reference to the item or category and the amount
        $this->addSql('INSERT INTO discount (product_id, percentage, start_date, end_date) VALUES (1, 30, "2020-01-01", "2040-01-01")');
        $this->addSql('INSERT INTO discount (product_id, percentage, start_date, end_date) VALUES (2, 30, "2020-01-01", "2040-01-01")');
        $this->addSql('INSERT INTO discount (product_id, percentage, start_date, end_date) VALUES (3, 30, "2020-01-01", "2040-01-01")');
        $this->addSql('INSERT INTO discount (product_id, percentage, start_date, end_date) VALUES (3, 15, "2020-01-01", "2040-01-01")');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DELETE FROM discount');
    }
}
