<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323141624 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE smartphone (id INT AUTO_INCREMENT NOT NULL, id_category_id INT DEFAULT NULL, id_product_id INT DEFAULT NULL, resolution VARCHAR(10) NOT NULL, resolution_px VARCHAR(10) NOT NULL, battery VARCHAR(10) NOT NULL, os VARCHAR(10) NOT NULL, camera VARCHAR(10) NOT NULL, camera_px VARCHAR(10) NOT NULL, technology VARCHAR(10) NOT NULL, memory VARCHAR(10) NOT NULL, memory_ram VARCHAR(10) NOT NULL, connectors VARCHAR(10) NOT NULL, sim_type VARCHAR(10) NOT NULL, sd_type VARCHAR(10) NOT NULL, color VARCHAR(20) NOT NULL, INDEX IDX_26B07E2EA545015 (id_category_id), INDEX IDX_26B07E2EE00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE smartphone ADD CONSTRAINT FK_26B07E2EA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE smartphone ADD CONSTRAINT FK_26B07E2EE00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE smartphone');
    }
}
