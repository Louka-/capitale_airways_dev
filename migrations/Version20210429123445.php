<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429123445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE city_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE flight_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE city (id INT NOT NULL, name VARCHAR(45) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE flight (id INT NOT NULL, departure_id INT NOT NULL, arrival_id INT NOT NULL, numero VARCHAR(45) NOT NULL, schedule TIME(0) WITHOUT TIME ZONE NOT NULL, price DOUBLE PRECISION NOT NULL, reduction BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C257E60E7704ED06 ON flight (departure_id)');
        $this->addSql('CREATE INDEX IDX_C257E60E62789708 ON flight (arrival_id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60E7704ED06 FOREIGN KEY (departure_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60E62789708 FOREIGN KEY (arrival_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE flight DROP CONSTRAINT FK_C257E60E7704ED06');
        $this->addSql('ALTER TABLE flight DROP CONSTRAINT FK_C257E60E62789708');
        $this->addSql('DROP SEQUENCE city_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE flight_id_seq CASCADE');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE flight');
    }
}
