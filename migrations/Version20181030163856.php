<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181030163856 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, default_model_id INT NOT NULL, sub_category_id INT NOT NULL, label VARCHAR(100) NOT NULL, slug VARCHAR(125) NOT NULL, description LONGTEXT DEFAULT NULL, detail LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_D34A04AD989D9B62 (slug), UNIQUE INDEX UNIQ_D34A04AD7F3187A9 (default_model_id), INDEX IDX_D34A04ADF7BFE87C (sub_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_model (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, label VARCHAR(100) NOT NULL, slug VARCHAR(125) NOT NULL, reference VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_76C90985989D9B62 (slug), INDEX IDX_76C909854584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7F3187A9 FOREIGN KEY (default_model_id) REFERENCES product_model (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES product_sub_category (id)');
        $this->addSql('ALTER TABLE product_model ADD CONSTRAINT FK_76C909854584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_model DROP FOREIGN KEY FK_76C909854584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD7F3187A9');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_model');
    }
}
