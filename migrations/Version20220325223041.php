<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325223041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gra ADD liczba_graczy_max INT NOT NULL, ADD wiek_od_lat INT NOT NULL, ADD cena INT NOT NULL, ADD kaucja INT NOT NULL, DROP wiek_graczy, CHANGE id_kategoria_id id_kategoria_id INT NOT NULL, CHANGE id_wydawnictwo_id id_wydawnictwo_id INT NOT NULL, CHANGE liczba_graczy liczba_graczy_min INT NOT NULL');
        $this->addSql('ALTER TABLE zdjecie DROP INDEX UNIQ_5A1D45CA1B8C1447, ADD INDEX IDX_5A1D45CA1B8C1447 (id_gra_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gra ADD liczba_graczy INT NOT NULL, ADD wiek_graczy VARCHAR(255) NOT NULL, DROP liczba_graczy_min, DROP liczba_graczy_max, DROP wiek_od_lat, DROP cena, DROP kaucja, CHANGE id_kategoria_id id_kategoria_id INT DEFAULT NULL, CHANGE id_wydawnictwo_id id_wydawnictwo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zdjecie DROP INDEX IDX_5A1D45CA1B8C1447, ADD UNIQUE INDEX UNIQ_5A1D45CA1B8C1447 (id_gra_id)');
    }
}
