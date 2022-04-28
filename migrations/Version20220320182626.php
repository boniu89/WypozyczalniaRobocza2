<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220320182626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE egzemplarz (id INT AUTO_INCREMENT NOT NULL, id_gra_id INT NOT NULL, identyfikator INT NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_D0DC33841B8C1447 (id_gra_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gra (id INT AUTO_INCREMENT NOT NULL, id_kategoria_id INT DEFAULT NULL, id_wydawnictwo_id INT DEFAULT NULL, nazwa VARCHAR(255) NOT NULL, liczba_graczy INT NOT NULL, sredni_czas_gry TIME NOT NULL, opis LONGTEXT NOT NULL, status TINYINT(1) NOT NULL, wiek_graczy VARCHAR(255) NOT NULL, INDEX IDX_95654E0D165A73F6 (id_kategoria_id), INDEX IDX_95654E0D30DA14E7 (id_wydawnictwo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE komentarz (id INT AUTO_INCREMENT NOT NULL, id_gra_id INT NOT NULL, id_uzytkownik_id INT NOT NULL, tresc LONGTEXT NOT NULL, czy_prywatny TINYINT(1) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_A53FD6AA1B8C1447 (id_gra_id), INDEX IDX_A53FD6AA8FFE2C8C (id_uzytkownik_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lista_zyczen (id INT AUTO_INCREMENT NOT NULL, id_uzytkownik_id INT NOT NULL, id_gra_id INT NOT NULL, INDEX IDX_98F710AD8FFE2C8C (id_uzytkownik_id), INDEX IDX_98F710AD1B8C1447 (id_gra_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE powiadomienie (id INT AUTO_INCREMENT NOT NULL, tresc LONGTEXT NOT NULL, typ VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rezerwacja (id INT AUTO_INCREMENT NOT NULL, id_uzytkownik_id INT NOT NULL, id_egzemplarz_id INT NOT NULL, data_rezerwacji DATE NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_8268B0CB8FFE2C8C (id_uzytkownik_id), UNIQUE INDEX UNIQ_8268B0CB455B5C16 (id_egzemplarz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uzytkownik (id INT AUTO_INCREMENT NOT NULL, id_rola_id INT NOT NULL, imie VARCHAR(255) NOT NULL, nazwisko VARCHAR(255) NOT NULL, miasto VARCHAR(255) NOT NULL, nr_domu VARCHAR(255) NOT NULL, nr_lokalu INT NOT NULL, adres_email VARCHAR(255) NOT NULL, nr_tel_kom INT NOT NULL, powiadomienia_o_nowosciach SMALLINT NOT NULL, nick VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_9EF0185687FC1C8B (id_rola_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wypozyczenie (id INT AUTO_INCREMENT NOT NULL, id_uzytkownik_id INT NOT NULL, id_egzemplarz_id INT NOT NULL, data_wyp DATE NOT NULL, data_zwrotu DATE NOT NULL, uwagi_admin_przed LONGTEXT DEFAULT NULL, uwagi_admin_po LONGTEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_65CF30978FFE2C8C (id_uzytkownik_id), UNIQUE INDEX UNIQ_65CF3097455B5C16 (id_egzemplarz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zdjecie (id INT AUTO_INCREMENT NOT NULL, id_gra_id INT NOT NULL, sciezka_zdjecie VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5A1D45CA1B8C1447 (id_gra_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE egzemplarz ADD CONSTRAINT FK_D0DC33841B8C1447 FOREIGN KEY (id_gra_id) REFERENCES gra (id)');
        $this->addSql('ALTER TABLE gra ADD CONSTRAINT FK_95654E0D165A73F6 FOREIGN KEY (id_kategoria_id) REFERENCES kategoria (id)');
        $this->addSql('ALTER TABLE gra ADD CONSTRAINT FK_95654E0D30DA14E7 FOREIGN KEY (id_wydawnictwo_id) REFERENCES wydawnictwo (id)');
        $this->addSql('ALTER TABLE komentarz ADD CONSTRAINT FK_A53FD6AA1B8C1447 FOREIGN KEY (id_gra_id) REFERENCES gra (id)');
        $this->addSql('ALTER TABLE komentarz ADD CONSTRAINT FK_A53FD6AA8FFE2C8C FOREIGN KEY (id_uzytkownik_id) REFERENCES uzytkownik (id)');
        $this->addSql('ALTER TABLE lista_zyczen ADD CONSTRAINT FK_98F710AD8FFE2C8C FOREIGN KEY (id_uzytkownik_id) REFERENCES uzytkownik (id)');
        $this->addSql('ALTER TABLE lista_zyczen ADD CONSTRAINT FK_98F710AD1B8C1447 FOREIGN KEY (id_gra_id) REFERENCES gra (id)');
        $this->addSql('ALTER TABLE rezerwacja ADD CONSTRAINT FK_8268B0CB8FFE2C8C FOREIGN KEY (id_uzytkownik_id) REFERENCES uzytkownik (id)');
        $this->addSql('ALTER TABLE rezerwacja ADD CONSTRAINT FK_8268B0CB455B5C16 FOREIGN KEY (id_egzemplarz_id) REFERENCES egzemplarz (id)');
        $this->addSql('ALTER TABLE uzytkownik ADD CONSTRAINT FK_9EF0185687FC1C8B FOREIGN KEY (id_rola_id) REFERENCES rola (id)');
        $this->addSql('ALTER TABLE wypozyczenie ADD CONSTRAINT FK_65CF30978FFE2C8C FOREIGN KEY (id_uzytkownik_id) REFERENCES uzytkownik (id)');
        $this->addSql('ALTER TABLE wypozyczenie ADD CONSTRAINT FK_65CF3097455B5C16 FOREIGN KEY (id_egzemplarz_id) REFERENCES egzemplarz (id)');
        $this->addSql('ALTER TABLE zdjecie ADD CONSTRAINT FK_5A1D45CA1B8C1447 FOREIGN KEY (id_gra_id) REFERENCES gra (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rezerwacja DROP FOREIGN KEY FK_8268B0CB455B5C16');
        $this->addSql('ALTER TABLE wypozyczenie DROP FOREIGN KEY FK_65CF3097455B5C16');
        $this->addSql('ALTER TABLE egzemplarz DROP FOREIGN KEY FK_D0DC33841B8C1447');
        $this->addSql('ALTER TABLE komentarz DROP FOREIGN KEY FK_A53FD6AA1B8C1447');
        $this->addSql('ALTER TABLE lista_zyczen DROP FOREIGN KEY FK_98F710AD1B8C1447');
        $this->addSql('ALTER TABLE zdjecie DROP FOREIGN KEY FK_5A1D45CA1B8C1447');
        $this->addSql('ALTER TABLE komentarz DROP FOREIGN KEY FK_A53FD6AA8FFE2C8C');
        $this->addSql('ALTER TABLE lista_zyczen DROP FOREIGN KEY FK_98F710AD8FFE2C8C');
        $this->addSql('ALTER TABLE rezerwacja DROP FOREIGN KEY FK_8268B0CB8FFE2C8C');
        $this->addSql('ALTER TABLE wypozyczenie DROP FOREIGN KEY FK_65CF30978FFE2C8C');
        $this->addSql('DROP TABLE egzemplarz');
        $this->addSql('DROP TABLE gra');
        $this->addSql('DROP TABLE komentarz');
        $this->addSql('DROP TABLE lista_zyczen');
        $this->addSql('DROP TABLE powiadomienie');
        $this->addSql('DROP TABLE rezerwacja');
        $this->addSql('DROP TABLE uzytkownik');
        $this->addSql('DROP TABLE wypozyczenie');
        $this->addSql('DROP TABLE zdjecie');
    }
}
