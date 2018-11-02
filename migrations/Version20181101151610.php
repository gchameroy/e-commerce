<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181101151610 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE filter (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, label VARCHAR(20) NOT NULL, slug VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_7FC45F1D989D9B62 (slug), INDEX IDX_7FC45F1D12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filter_category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(20) NOT NULL, slug VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_3B231C61989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_model_filter (product_model_id INT NOT NULL, filter_id INT NOT NULL, INDEX IDX_D18759E9B2C5DD70 (product_model_id), INDEX IDX_D18759E9D395B25E (filter_id), PRIMARY KEY(product_model_id, filter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE filter ADD CONSTRAINT FK_7FC45F1D12469DE2 FOREIGN KEY (category_id) REFERENCES filter_category (id)');
        $this->addSql('ALTER TABLE product_model_filter ADD CONSTRAINT FK_D18759E9B2C5DD70 FOREIGN KEY (product_model_id) REFERENCES product_model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_model_filter ADD CONSTRAINT FK_D18759E9D395B25E FOREIGN KEY (filter_id) REFERENCES filter (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_model_filter DROP FOREIGN KEY FK_D18759E9D395B25E');
        $this->addSql('ALTER TABLE filter DROP FOREIGN KEY FK_7FC45F1D12469DE2');
        $this->addSql('DROP TABLE filter');
        $this->addSql('DROP TABLE filter_category');
        $this->addSql('DROP TABLE product_model_filter');
    }
}
