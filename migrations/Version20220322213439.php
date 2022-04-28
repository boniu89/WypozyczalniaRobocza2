<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220322213439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE uzytkownik DROP FOREIGN KEY FK_9EF0185687FC1C8B');
        $this->addSql('DROP INDEX IDX_9EF0185687FC1C8B ON uzytkownik');
        $this->addSql('ALTER TABLE uzytkownik ADD email VARCHAR(180) NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD password VARCHAR(255) NOT NULL, ADD ulica VARCHAR(255) NOT NULL, DROP id_rola_id, DROP miasto, DROP adres_email, DROP haslo, CHANGE nr_lokalu nr_lokalu VARCHAR(255) DEFAULT NULL, CHANGE nick nick VARCHAR(255) NOT NULL, CHANGE powiadomienia_o_nowosciach powiadomienie_o_nowosciach TINYINT(1) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9EF01856E7927C74 ON uzytkownik (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_9EF01856E7927C74 ON uzytkownik');
        $this->addSql('ALTER TABLE uzytkownik ADD id_rola_id INT NOT NULL, ADD miasto VARCHAR(255) NOT NULL, ADD adres_email VARCHAR(255) NOT NULL, ADD haslo VARCHAR(255) NOT NULL, DROP email, DROP roles, DROP password, DROP ulica, CHANGE nr_lokalu nr_lokalu INT NOT NULL, CHANGE nick nick VARCHAR(255) DEFAULT NULL, CHANGE powiadomienie_o_nowosciach powiadomienia_o_nowosciach TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE uzytkownik ADD CONSTRAINT FK_9EF0185687FC1C8B FOREIGN KEY (id_rola_id) REFERENCES rola (id)');
        $this->addSql('CREATE INDEX IDX_9EF0185687FC1C8B ON uzytkownik (id_rola_id)');
    }
}
