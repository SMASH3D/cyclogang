<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181218174653 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, strava_id INT DEFAULT NULL, strava_short_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terrain (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discipline (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE segment (id INT AUTO_INCREMENT NOT NULL, discipline_id INT DEFAULT NULL, strava_id INT DEFAULT NULL, length INT NOT NULL, distance INT NOT NULL, average_grade SMALLINT DEFAULT NULL, max_elevation INT DEFAULT NULL, min_elevation INT DEFAULT NULL, INDEX IDX_1881F565A5522701 (discipline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, has_lift TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot_discipline (spot_id INT NOT NULL, discipline_id INT NOT NULL, INDEX IDX_59201A3C2DF1D37C (spot_id), INDEX IDX_59201A3CA5522701 (discipline_id), PRIMARY KEY(spot_id, discipline_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE segment ADD CONSTRAINT FK_1881F565A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id)');
        $this->addSql('ALTER TABLE spot_discipline ADD CONSTRAINT FK_59201A3C2DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spot_discipline ADD CONSTRAINT FK_59201A3CA5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE segment DROP FOREIGN KEY FK_1881F565A5522701');
        $this->addSql('ALTER TABLE spot_discipline DROP FOREIGN KEY FK_59201A3CA5522701');
        $this->addSql('ALTER TABLE spot_discipline DROP FOREIGN KEY FK_59201A3C2DF1D37C');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE terrain');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE segment');
        $this->addSql('DROP TABLE spot');
        $this->addSql('DROP TABLE spot_discipline');
    }
}
