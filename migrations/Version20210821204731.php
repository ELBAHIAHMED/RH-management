<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210821204731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, employee_id_educ INT NOT NULL, elementary_school VARCHAR(300) NOT NULL, high_school VARCHAR(300) NOT NULL, college VARCHAR(255) NOT NULL, university VARCHAR(255) NOT NULL, master VARCHAR(255) NOT NULL, elementary_school1 VARCHAR(255) NOT NULL, high_school1 VARCHAR(255) NOT NULL, college1 VARCHAR(255) NOT NULL, university1 VARCHAR(255) NOT NULL, master1 VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DB0A5ED2EFFD4C8D (employee_id_educ), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, first_experience VARCHAR(500) NOT NULL, second_experience VARCHAR(500) NOT NULL, third_experience VARCHAR(500) DEFAULT NULL, employee_id_exp INT NOT NULL, UNIQUE INDEX UNIQ_590C103B12B7ED4 (employee_id_exp), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infos (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, birthday VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, role VARCHAR(255) NOT NULL, employee_id INT DEFAULT NULL, experience INT NOT NULL, participated INT NOT NULL, awards INT NOT NULL, join_date VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EECA826D8C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, first_lan VARCHAR(255) NOT NULL, second_lan VARCHAR(255) DEFAULT NULL, third_lan VARCHAR(255) DEFAULT NULL, percentage_first INT NOT NULL, percentage_second INT DEFAULT NULL, percentage_third INT DEFAULT NULL, employee_id INT NOT NULL, UNIQUE INDEX UNIQ_D4DB71B58C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, employee_id_miss INT NOT NULL, client_name VARCHAR(255) NOT NULL, start_date VARCHAR(255) DEFAULT NULL, end_date VARCHAR(255) DEFAULT NULL, validation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personal_skills (id INT AUTO_INCREMENT NOT NULL, fist VARCHAR(255) NOT NULL, second VARCHAR(255) NOT NULL, third VARCHAR(255) DEFAULT NULL, fourth VARCHAR(255) DEFAULT NULL, employee_id_personal_skills INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, employee_id INT NOT NULL, role VARCHAR(255) NOT NULL, join_date VARCHAR(255) DEFAULT NULL, languagase LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', education JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, fist VARCHAR(255) NOT NULL, first_perc INT NOT NULL, second VARCHAR(255) NOT NULL, second_percent INT NOT NULL, third VARCHAR(255) DEFAULT NULL, third_perc INT DEFAULT NULL, fourth VARCHAR(255) DEFAULT NULL, fourth_perc INT DEFAULT NULL, employee_id_skills INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE infos');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE personal_skills');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE user');
    }
}
