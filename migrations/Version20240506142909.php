<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506142909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bet (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_game_id INT NOT NULL, id_team SMALLINT NOT NULL, points_betted INT NOT NULL, INDEX IDX_FBF0EC9B79F37AE5 (id_user_id), INDEX IDX_FBF0EC9B3A127075 (id_game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, vip_player_id INT DEFAULT NULL, id_blue_team_id INT DEFAULT NULL, id_red_team_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, begin_at DATETIME NOT NULL, finished_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_waiting TINYINT(1) NOT NULL, is_pending TINYINT(1) NOT NULL, is_two_vs_two TINYINT(1) NOT NULL, score_blue_team SMALLINT DEFAULT NULL, score_red_team SMALLINT DEFAULT NULL, winner VARCHAR(75) DEFAULT NULL, winning_reason VARCHAR(100) DEFAULT NULL, invite_link LONGTEXT DEFAULT NULL, is_friendly TINYINT(1) NOT NULL, INDEX IDX_232B318C694CDD05 (vip_player_id), INDEX IDX_232B318CF82129F8 (id_blue_team_id), INDEX IDX_232B318CDB9C6E0F (id_red_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_team_collection (id INT AUTO_INCREMENT NOT NULL, id_team_id INT NOT NULL, id_item_id INT NOT NULL, INDEX IDX_7855CC55F7F171DE (id_team_id), INDEX IDX_7855CC55CCF2FB2E (id_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_user_collection (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_item_id INT NOT NULL, INDEX IDX_E1EB787C79F37AE5 (id_user_id), INDEX IDX_E1EB787CCCF2FB2E (id_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(100) DEFAULT NULL, price SMALLINT DEFAULT NULL, path LONGTEXT NOT NULL, how_to_unlock VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, is_available TINYINT(1) NOT NULL, is_exclusive TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(75) NOT NULL, slogan VARCHAR(75) DEFAULT NULL, description VARCHAR(150) DEFAULT NULL, points_number INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, is_recruiting TINYINT(1) NOT NULL, is_dissolute TINYINT(1) NOT NULL, total_point_earned INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(20) NOT NULL, firstname VARCHAR(20) NOT NULL, email VARCHAR(80) NOT NULL, password LONGTEXT NOT NULL, avatar LONGTEXT DEFAULT NULL, username VARCHAR(30) NOT NULL, working_location VARCHAR(20) NOT NULL, studying_class VARCHAR(30) DEFAULT NULL, favorite_role VARCHAR(20) DEFAULT NULL, points_number INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, last_logged_at DATETIME DEFAULT NULL, warned_at DATETIME DEFAULT NULL, banned_at DATETIME DEFAULT NULL, is_verified TINYINT(1) NOT NULL, is_warned TINYINT(1) NOT NULL, is_banned TINYINT(1) NOT NULL, is_password_requested TINYINT(1) NOT NULL, password_number_request INT NOT NULL, warn_number INT NOT NULL, total_points_earned INT NOT NULL, role JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_team (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_team_id INT NOT NULL, INDEX IDX_BE61EAD679F37AE5 (id_user_id), INDEX IDX_BE61EAD6F7F171DE (id_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9B79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9B3A127075 FOREIGN KEY (id_game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C694CDD05 FOREIGN KEY (vip_player_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CF82129F8 FOREIGN KEY (id_blue_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CDB9C6E0F FOREIGN KEY (id_red_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE item_team_collection ADD CONSTRAINT FK_7855CC55F7F171DE FOREIGN KEY (id_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE item_team_collection ADD CONSTRAINT FK_7855CC55CCF2FB2E FOREIGN KEY (id_item_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE item_user_collection ADD CONSTRAINT FK_E1EB787C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE item_user_collection ADD CONSTRAINT FK_E1EB787CCCF2FB2E FOREIGN KEY (id_item_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD679F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6F7F171DE FOREIGN KEY (id_team_id) REFERENCES team (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9B79F37AE5');
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9B3A127075');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C694CDD05');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CF82129F8');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CDB9C6E0F');
        $this->addSql('ALTER TABLE item_team_collection DROP FOREIGN KEY FK_7855CC55F7F171DE');
        $this->addSql('ALTER TABLE item_team_collection DROP FOREIGN KEY FK_7855CC55CCF2FB2E');
        $this->addSql('ALTER TABLE item_user_collection DROP FOREIGN KEY FK_E1EB787C79F37AE5');
        $this->addSql('ALTER TABLE item_user_collection DROP FOREIGN KEY FK_E1EB787CCCF2FB2E');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD679F37AE5');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6F7F171DE');
        $this->addSql('DROP TABLE bet');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE item_team_collection');
        $this->addSql('DROP TABLE item_user_collection');
        $this->addSql('DROP TABLE shop');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_team');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
