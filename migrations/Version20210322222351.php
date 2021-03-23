<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322222351 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE desktop ADD id_subcategory_id INT NOT NULL, ADD id_product_id INT NOT NULL, ADD processor_maker VARCHAR(20) NOT NULL, ADD processor_model VARCHAR(20) NOT NULL, ADD processor_velocity VARCHAR(20) NOT NULL, ADD processor_core VARCHAR(20) NOT NULL, ADD processor_cache VARCHAR(20) NOT NULL, ADD graphic_maker VARCHAR(20) NOT NULL, ADD graphic_model VARCHAR(20) NOT NULL, ADD graphic_technology VARCHAR(20) NOT NULL, ADD graphic_capacity VARCHAR(20) NOT NULL, ADD graphic_interface VARCHAR(20) NOT NULL, ADD usb2_0 INT NOT NULL, ADD usb3_0 INT NOT NULL, ADD hdmi INT NOT NULL, ADD dvi INT DEFAULT NULL, ADD bluetooth INT DEFAULT NULL');
        $this->addSql('ALTER TABLE desktop ADD CONSTRAINT FK_96105A460A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE desktop ADD CONSTRAINT FK_96105A4E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_96105A460A04351 ON desktop (id_subcategory_id)');
        $this->addSql('CREATE INDEX IDX_96105A4E00EE68D ON desktop (id_product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE desktop DROP FOREIGN KEY FK_96105A460A04351');
        $this->addSql('ALTER TABLE desktop DROP FOREIGN KEY FK_96105A4E00EE68D');
        $this->addSql('DROP INDEX IDX_96105A460A04351 ON desktop');
        $this->addSql('DROP INDEX IDX_96105A4E00EE68D ON desktop');
        $this->addSql('ALTER TABLE desktop DROP id_subcategory_id, DROP id_product_id, DROP processor_maker, DROP processor_model, DROP processor_velocity, DROP processor_core, DROP processor_cache, DROP graphic_maker, DROP graphic_model, DROP graphic_technology, DROP graphic_capacity, DROP graphic_interface, DROP usb2_0, DROP usb3_0, DROP hdmi, DROP dvi, DROP bluetooth');
    }
}
