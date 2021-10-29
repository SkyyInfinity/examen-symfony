<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029135438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant ADD ville_id INT NOT NULL, ADD proprietaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FA73F0036 ON restaurant (ville_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EB95123F76C50E4A ON restaurant (proprietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FA73F0036');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F76C50E4A');
        $this->addSql('DROP INDEX IDX_EB95123FA73F0036 ON restaurant');
        $this->addSql('DROP INDEX UNIQ_EB95123F76C50E4A ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP ville_id, DROP proprietaire_id');
    }
}
