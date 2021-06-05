<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210605213838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE0494484');
        $this->addSql('DROP INDEX IDX_D34A04ADE0494484 ON product');
        $this->addSql('ALTER TABLE product CHANGE id_store_id store_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADB092A811 ON product (store_id)');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF5758776C8A81A9');
        $this->addSql('DROP INDEX UNIQ_FF5758776C8A81A9 ON store');
        $this->addSql('ALTER TABLE store DROP products_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADB092A811');
        $this->addSql('DROP INDEX IDX_D34A04ADB092A811 ON product');
        $this->addSql('ALTER TABLE product CHANGE store_id id_store_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE0494484 FOREIGN KEY (id_store_id) REFERENCES store (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADE0494484 ON product (id_store_id)');
        $this->addSql('ALTER TABLE store ADD products_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF5758776C8A81A9 FOREIGN KEY (products_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FF5758776C8A81A9 ON store (products_id)');
    }
}
