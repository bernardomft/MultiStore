<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210605205134 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE graphic_card');
        $this->addSql('DROP TABLE hard_disk');
        $this->addSql('DROP TABLE motherboard');
        $this->addSql('DROP TABLE power_supply');
        $this->addSql('DROP TABLE processor');
        $this->addSql('DROP TABLE ram_memory');
        $this->addSql('DROP TABLE refrigeration');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE graphic_card (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT DEFAULT NULL, id_product_id INT NOT NULL, size VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, resolution_max VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, clock_frequency VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type_memory VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, speed_memory VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, interface VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_5184D45860A04351 (id_subcategory_id), INDEX IDX_5184D458E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE hard_disk (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT NOT NULL, id_product_id INT NOT NULL, memory VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, size VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_6212417D60A04351 (id_subcategory_id), INDEX IDX_6212417DE00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE motherboard (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT NOT NULL, id_product_id INT NOT NULL, size VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, color VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, process_socket VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, memory_ram_type VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, memory_ram_slots VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, graphic_interface VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, internal_clock VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, connections VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_7F7A0F2B60A04351 (id_subcategory_id), INDEX IDX_7F7A0F2BE00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE power_supply (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT NOT NULL, id_product_id INT DEFAULT NULL, size VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, potency VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_C6E145F360A04351 (id_subcategory_id), INDEX IDX_C6E145F3E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE processor (id INT AUTO_INCREMENT NOT NULL, idsubcategory_id INT NOT NULL, id_product_id INT NOT NULL, size VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, speed VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, core_number VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, socket VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_29C046504CBE6F1C (idsubcategory_id), INDEX IDX_29C04650E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ram_memory (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT NOT NULL, id_product_id INT NOT NULL, capacity VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, frequency VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_9FF2119660A04351 (id_subcategory_id), INDEX IDX_9FF21196E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE refrigeration (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT NOT NULL, id_product_id INT DEFAULT NULL, size VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D51C6EF060A04351 (id_subcategory_id), INDEX IDX_D51C6EF0E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE graphic_card ADD CONSTRAINT FK_5184D45860A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE graphic_card ADD CONSTRAINT FK_5184D458E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE hard_disk ADD CONSTRAINT FK_6212417D60A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE hard_disk ADD CONSTRAINT FK_6212417DE00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE motherboard ADD CONSTRAINT FK_7F7A0F2B60A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE motherboard ADD CONSTRAINT FK_7F7A0F2BE00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE power_supply ADD CONSTRAINT FK_C6E145F360A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE power_supply ADD CONSTRAINT FK_C6E145F3E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE processor ADD CONSTRAINT FK_29C046504CBE6F1C FOREIGN KEY (idsubcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE processor ADD CONSTRAINT FK_29C04650E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE ram_memory ADD CONSTRAINT FK_9FF2119660A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE ram_memory ADD CONSTRAINT FK_9FF21196E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE refrigeration ADD CONSTRAINT FK_D51C6EF060A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE refrigeration ADD CONSTRAINT FK_D51C6EF0E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
    }
}
