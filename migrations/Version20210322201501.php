<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322201501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_product (id INT AUTO_INCREMENT NOT NULL, id_order_id INT NOT NULL, amount INT NOT NULL, INDEX IDX_2530ADE6DD4481AD (id_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, model VARCHAR(20) NOT NULL, mark VARCHAR(20) NOT NULL, maker VARCHAR(20) NOT NULL, stock INT NOT NULL, description VARCHAR(300) NOT NULL, picture VARCHAR(200) NOT NULL, price DOUBLE PRECISION NOT NULL, disscount DOUBLE PRECISION DEFAULT NULL, second_hand TINYINT(1) NOT NULL, dimensions VARCHAR(30) DEFAULT NULL, weight VARCHAR(30) DEFAULT NULL, year INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE6DD4481AD FOREIGN KEY (id_order_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE order_product');
        $this->addSql('DROP TABLE product');
    }
}
