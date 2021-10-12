<?php

declare(strict_types=1);

namespace DoctrineMigrations;

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
        $this->addSql('INSERT INTO product VALUES ("000001", "BV Lean leather ankle boots", "boots")');
        $this->addSql('INSERT INTO product VALUES ("000002", "BV Lean leather ankle boots", "boots")');
        $this->addSql('INSERT INTO product VALUES ("000003", "Ashlington leather ankle boots", "boots")');
        $this->addSql('INSERT INTO product VALUES ("000004", "Naima embellished suede sandals", "sandals")');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
