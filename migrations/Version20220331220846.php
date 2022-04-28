<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331220846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rezerwacja DROP INDEX UNIQ_8268B0CB455B5C16, ADD INDEX IDX_8268B0CB455B5C16 (id_egzemplarz_id)');
        $this->addSql('ALTER TABLE rezerwacja DROP FOREIGN KEY FK_8268B0CB8FFE2C8C');
        $this->addSql('DROP INDEX IDX_8268B0CB8FFE2C8C ON rezerwacja');
        $this->addSql('ALTER TABLE rezerwacja ADD data_rezerwacji_stop DATE NOT NULL, CHANGE id_uzytkownik_id id_user_id INT NOT NULL, CHANGE data_rezerwacji data_rezerwacji_start DATE NOT NULL');
        $this->addSql('ALTER TABLE rezerwacja ADD CONSTRAINT FK_8268B0CB79F37AE5 FOREIGN KEY (id_user_id) REFERENCES uzytkownik (id)');
        $this->addSql('CREATE INDEX IDX_8268B0CB79F37AE5 ON rezerwacja (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rezerwacja DROP INDEX IDX_8268B0CB455B5C16, ADD UNIQUE INDEX UNIQ_8268B0CB455B5C16 (id_egzemplarz_id)');
        $this->addSql('ALTER TABLE rezerwacja DROP FOREIGN KEY FK_8268B0CB79F37AE5');
        $this->addSql('DROP INDEX IDX_8268B0CB79F37AE5 ON rezerwacja');
        $this->addSql('ALTER TABLE rezerwacja ADD data_rezerwacji DATE NOT NULL, DROP data_rezerwacji_start, DROP data_rezerwacji_stop, CHANGE id_user_id id_uzytkownik_id INT NOT NULL');
        $this->addSql('ALTER TABLE rezerwacja ADD CONSTRAINT FK_8268B0CB8FFE2C8C FOREIGN KEY (id_uzytkownik_id) REFERENCES uzytkownik (id)');
        $this->addSql('CREATE INDEX IDX_8268B0CB8FFE2C8C ON rezerwacja (id_uzytkownik_id)');
    }
}
