<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240618162903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_tag (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_tag_article (article_tag_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_AA8849ABD015F491 (article_tag_id), INDEX IDX_AA8849AB7294869C (article_id), PRIMARY KEY(article_tag_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_tag_tag (article_tag_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_EF856936D015F491 (article_tag_id), INDEX IDX_EF856936BAD26311 (tag_id), PRIMARY KEY(article_tag_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_tag_article ADD CONSTRAINT FK_AA8849ABD015F491 FOREIGN KEY (article_tag_id) REFERENCES article_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_tag_article ADD CONSTRAINT FK_AA8849AB7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_tag_tag ADD CONSTRAINT FK_EF856936D015F491 FOREIGN KEY (article_tag_id) REFERENCES article_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_tag_tag ADD CONSTRAINT FK_EF856936BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_tag_article DROP FOREIGN KEY FK_AA8849ABD015F491');
        $this->addSql('ALTER TABLE article_tag_article DROP FOREIGN KEY FK_AA8849AB7294869C');
        $this->addSql('ALTER TABLE article_tag_tag DROP FOREIGN KEY FK_EF856936D015F491');
        $this->addSql('ALTER TABLE article_tag_tag DROP FOREIGN KEY FK_EF856936BAD26311');
        $this->addSql('DROP TABLE article_tag');
        $this->addSql('DROP TABLE article_tag_article');
        $this->addSql('DROP TABLE article_tag_tag');
    }
}
