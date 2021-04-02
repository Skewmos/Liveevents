<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402213650 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ARTIST (IDARTIST INT AUTO_INCREMENT NOT NULL, NAME CHAR(255) DEFAULT NULL, PRIMARY KEY(IDARTIST)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participates (IDARTIST INT NOT NULL, IDCONCERT INT NOT NULL, INDEX IDX_33017524A3D7A767 (IDARTIST), INDEX IDX_330175244EBA4E53 (IDCONCERT), PRIMARY KEY(IDARTIST, IDCONCERT)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BILLIET (IDBILLIET INT AUTO_INCREMENT NOT NULL, NAMECONCERT CHAR(255) DEFAULT NULL, DATESTART DATETIME DEFAULT NULL, DATEEND DATETIME DEFAULT NULL, IDUSER INT DEFAULT NULL, INDEX I_FK_BILLIET_USER (IDUSER), PRIMARY KEY(IDBILLIET)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CONCERT (IDCONCERT INT AUTO_INCREMENT NOT NULL, NAME CHAR(255) DEFAULT NULL, DATESTART DATETIME DEFAULT NULL, DATEEND DATETIME DEFAULT NULL, NUMBERPLACE BIGINT DEFAULT NULL, PLACESOLD BIGINT DEFAULT NULL, IDLOCATION INT DEFAULT NULL, INDEX I_FK_CONCERT_LOCATION (IDLOCATION), PRIMARY KEY(IDCONCERT)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE LOCATION (IDLOCATION INT AUTO_INCREMENT NOT NULL, NAME CHAR(255) DEFAULT NULL, LONGITUDE NUMERIC(10, 2) DEFAULT NULL, LATITUDE NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(IDLOCATION)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE MUSICAL_GENRE (IDMUSICALGENRE CHAR(32) NOT NULL, NAMEGENRE CHAR(32) DEFAULT NULL, PRIMARY KEY(IDMUSICALGENRE)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (IDMUSICALGENRE CHAR(32) NOT NULL, IDCONCERT INT NOT NULL, INDEX IDX_835033F84B85B2A5 (IDMUSICALGENRE), INDEX IDX_835033F84EBA4E53 (IDCONCERT), PRIMARY KEY(IDMUSICALGENRE, IDCONCERT)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE RESTAURANT (IDRESTAURANT INT AUTO_INCREMENT NOT NULL, NAME CHAR(255) DEFAULT NULL, OPENHOURS TIME DEFAULT NULL, CLOSEHOURS TIME DEFAULT NULL, IDLOCATION INT DEFAULT NULL, INDEX I_FK_RESTAURANT_LOCATION (IDLOCATION), PRIMARY KEY(IDRESTAURANT)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE USER (IDUSER INT AUTO_INCREMENT NOT NULL, FIRSTNAME CHAR(255) DEFAULT NULL, LASTNAME CHAR(255) DEFAULT NULL, BIRTHDAY DATE DEFAULT NULL, EMAIL CHAR(255) DEFAULT NULL, PHONE CHAR(255) DEFAULT NULL, PASSWORD CHAR(255) DEFAULT NULL, CREATEDAT DATETIME DEFAULT NULL, UPDATEDAT DATETIME DEFAULT NULL, PICTUREURL TEXT DEFAULT NULL, PRIMARY KEY(IDUSER)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participates ADD CONSTRAINT FK_33017524A3D7A767 FOREIGN KEY (IDARTIST) REFERENCES ARTIST (IDARTIST)');
        $this->addSql('ALTER TABLE participates ADD CONSTRAINT FK_330175244EBA4E53 FOREIGN KEY (IDCONCERT) REFERENCES CONCERT (IDCONCERT)');
        $this->addSql('ALTER TABLE BILLIET ADD CONSTRAINT FK_B42D2AA5AEA4E06F FOREIGN KEY (IDUSER) REFERENCES USER (IDUSER)');
        $this->addSql('ALTER TABLE CONCERT ADD CONSTRAINT FK_EA39FCC8FFD4DCF9 FOREIGN KEY (IDLOCATION) REFERENCES LOCATION (IDLOCATION)');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F84B85B2A5 FOREIGN KEY (IDMUSICALGENRE) REFERENCES MUSICAL_GENRE (IDMUSICALGENRE)');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F84EBA4E53 FOREIGN KEY (IDCONCERT) REFERENCES CONCERT (IDCONCERT)');
        $this->addSql('ALTER TABLE RESTAURANT ADD CONSTRAINT FK_E00A0F00FFD4DCF9 FOREIGN KEY (IDLOCATION) REFERENCES LOCATION (IDLOCATION)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participates DROP FOREIGN KEY FK_33017524A3D7A767');
        $this->addSql('ALTER TABLE participates DROP FOREIGN KEY FK_330175244EBA4E53');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F84EBA4E53');
        $this->addSql('ALTER TABLE CONCERT DROP FOREIGN KEY FK_EA39FCC8FFD4DCF9');
        $this->addSql('ALTER TABLE RESTAURANT DROP FOREIGN KEY FK_E00A0F00FFD4DCF9');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F84B85B2A5');
        $this->addSql('ALTER TABLE BILLIET DROP FOREIGN KEY FK_B42D2AA5AEA4E06F');
        $this->addSql('DROP TABLE ARTIST');
        $this->addSql('DROP TABLE participates');
        $this->addSql('DROP TABLE BILLIET');
        $this->addSql('DROP TABLE CONCERT');
        $this->addSql('DROP TABLE LOCATION');
        $this->addSql('DROP TABLE MUSICAL_GENRE');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE RESTAURANT');
        $this->addSql('DROP TABLE USER');
    }
}
