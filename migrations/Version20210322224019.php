<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322224019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE laptop (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT NOT NULL, id_product_id INT NOT NULL, ram_memory VARCHAR(20) NOT NULL, ram_techology VARCHAR(20) NOT NULL, ram_frequency VARCHAR(20) DEFAULT NULL, hard_disk VARCHAR(20) NOT NULL, hard_disk_technology VARCHAR(20) NOT NULL, processor_maker VARCHAR(20) NOT NULL, processor_model VARCHAR(20) NOT NULL, processor_velocity VARCHAR(20) NOT NULL, processor_core VARCHAR(20) NOT NULL, processor_cache VARCHAR(20) NOT NULL, graphic_maker VARCHAR(20) NOT NULL, graphic_model VARCHAR(20) NOT NULL, graphic_technology VARCHAR(20) NOT NULL, graphic_capacity VARCHAR(20) NOT NULL, graphic_interface VARCHAR(20) NOT NULL, usb2_0 INT NOT NULL, usb3_0 INT DEFAULT NULL, hdmi INT DEFAULT NULL, dvi INT DEFAULT NULL, bluetooht INT DEFAULT NULL, bluetooht_version VARCHAR(5) DEFAULT NULL, screen_size VARCHAR(30) DEFAULT NULL, screen_resolution VARCHAR(30) NOT NULL, screen_frequency VARCHAR(30) DEFAULT NULL, battery_capacity VARCHAR(30) DEFAULT NULL, battery_charge_time VARCHAR(30) DEFAULT NULL, INDEX IDX_E001563B60A04351 (id_subcategory_id), INDEX IDX_E001563BE00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE laptop ADD CONSTRAINT FK_E001563B60A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE laptop ADD CONSTRAINT FK_E001563BE00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE laptop');
    }
}
