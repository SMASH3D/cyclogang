<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181221095842 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, strava_id INT DEFAULT NULL, strava_short_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_discipline (user_id INT NOT NULL, discipline_id INT NOT NULL, INDEX IDX_D2D928D3A76ED395 (user_id), INDEX IDX_D2D928D3A5522701 (discipline_id), PRIMARY KEY(user_id, discipline_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terrain (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, wall_id INT NOT NULL, author_id INT NOT NULL, date DATETIME NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_9474526CC33923F1 (wall_id), INDEX IDX_9474526CF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment_flag (comment_id INT NOT NULL, flag_id INT NOT NULL, INDEX IDX_F7C24976F8697D13 (comment_id), INDEX IDX_F7C24976919FE4E5 (flag_id), PRIMARY KEY(comment_id, flag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, requires_moderation TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, strava_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_discipline (club_id INT NOT NULL, discipline_id INT NOT NULL, INDEX IDX_3C78A0D261190A32 (club_id), INDEX IDX_3C78A0D2A5522701 (discipline_id), PRIMARY KEY(club_id, discipline_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_user (club_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E95B1CA961190A32 (club_id), INDEX IDX_E95B1CA9A76ED395 (user_id), PRIMARY KEY(club_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wall (id INT AUTO_INCREMENT NOT NULL, is_public TINYINT(1) NOT NULL, is_protected TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discipline (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE segment (id INT AUTO_INCREMENT NOT NULL, discipline_id INT DEFAULT NULL, strava_id INT DEFAULT NULL, length INT NOT NULL, distance INT NOT NULL, average_grade SMALLINT DEFAULT NULL, max_elevation INT DEFAULT NULL, min_elevation INT DEFAULT NULL, INDEX IDX_1881F565A5522701 (discipline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rider (id INT AUTO_INCREMENT NOT NULL, strava_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, short_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, has_lift TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot_discipline (spot_id INT NOT NULL, discipline_id INT NOT NULL, INDEX IDX_59201A3C2DF1D37C (spot_id), INDEX IDX_59201A3CA5522701 (discipline_id), PRIMARY KEY(spot_id, discipline_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_discipline ADD CONSTRAINT FK_D2D928D3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_discipline ADD CONSTRAINT FK_D2D928D3A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CC33923F1 FOREIGN KEY (wall_id) REFERENCES wall (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment_flag ADD CONSTRAINT FK_F7C24976F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment_flag ADD CONSTRAINT FK_F7C24976919FE4E5 FOREIGN KEY (flag_id) REFERENCES flag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_discipline ADD CONSTRAINT FK_3C78A0D261190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_discipline ADD CONSTRAINT FK_3C78A0D2A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_user ADD CONSTRAINT FK_E95B1CA961190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_user ADD CONSTRAINT FK_E95B1CA9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE segment ADD CONSTRAINT FK_1881F565A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id)');
        $this->addSql('ALTER TABLE spot_discipline ADD CONSTRAINT FK_59201A3C2DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spot_discipline ADD CONSTRAINT FK_59201A3CA5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_discipline DROP FOREIGN KEY FK_D2D928D3A76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('ALTER TABLE club_user DROP FOREIGN KEY FK_E95B1CA9A76ED395');
        $this->addSql('ALTER TABLE comment_flag DROP FOREIGN KEY FK_F7C24976F8697D13');
        $this->addSql('ALTER TABLE comment_flag DROP FOREIGN KEY FK_F7C24976919FE4E5');
        $this->addSql('ALTER TABLE club_discipline DROP FOREIGN KEY FK_3C78A0D261190A32');
        $this->addSql('ALTER TABLE club_user DROP FOREIGN KEY FK_E95B1CA961190A32');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CC33923F1');
        $this->addSql('ALTER TABLE user_discipline DROP FOREIGN KEY FK_D2D928D3A5522701');
        $this->addSql('ALTER TABLE club_discipline DROP FOREIGN KEY FK_3C78A0D2A5522701');
        $this->addSql('ALTER TABLE segment DROP FOREIGN KEY FK_1881F565A5522701');
        $this->addSql('ALTER TABLE spot_discipline DROP FOREIGN KEY FK_59201A3CA5522701');
        $this->addSql('ALTER TABLE spot_discipline DROP FOREIGN KEY FK_59201A3C2DF1D37C');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_discipline');
        $this->addSql('DROP TABLE terrain');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE comment_flag');
        $this->addSql('DROP TABLE flag');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE club_discipline');
        $this->addSql('DROP TABLE club_user');
        $this->addSql('DROP TABLE wall');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE entity_type');
        $this->addSql('DROP TABLE segment');
        $this->addSql('DROP TABLE rider');
        $this->addSql('DROP TABLE spot');
        $this->addSql('DROP TABLE spot_discipline');
    }
}
