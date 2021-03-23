<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322232905 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mouse (id INT AUTO_INCREMENT NOT NULL, id_subcategory_id INT NOT NULL, id_product_id INT NOT NULL, dpi VARCHAR(20) NOT NULL, type VARCHAR(20) NOT NULL, type_2 VARCHAR(20) NOT NULL, connector VARCHAR(20) NOT NULL, frequency VARCHAR(20) NOT NULL, INDEX IDX_AF35B6ED60A04351 (id_subcategory_id), INDEX IDX_AF35B6EDE00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mouse ADD CONSTRAINT FK_AF35B6ED60A04351 FOREIGN KEY (id_subcategory_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE mouse ADD CONSTRAINT FK_AF35B6EDE00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mouse');
    }
}
