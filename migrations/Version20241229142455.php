<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241229142455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profile_competences (profile_id INT NOT NULL, competences_id INT NOT NULL, INDEX IDX_CE3D31B0CCFA12B8 (profile_id), INDEX IDX_CE3D31B0A660B158 (competences_id), PRIMARY KEY(profile_id, competences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profile_competences ADD CONSTRAINT FK_CE3D31B0CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profile_competences ADD CONSTRAINT FK_CE3D31B0A660B158 FOREIGN KEY (competences_id) REFERENCES competences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE centres_interets_profile DROP FOREIGN KEY FK_17D8D6B2CCFA12B8');
        $this->addSql('ALTER TABLE centres_interets_profile DROP FOREIGN KEY FK_17D8D6B2D9E5D9C9');
        $this->addSql('DROP TABLE centres_interets_profile');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE centres_interets_profile (centres_interets_id INT NOT NULL, profile_id INT NOT NULL, INDEX IDX_17D8D6B2CCFA12B8 (profile_id), INDEX IDX_17D8D6B2D9E5D9C9 (centres_interets_id), PRIMARY KEY(centres_interets_id, profile_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE centres_interets_profile ADD CONSTRAINT FK_17D8D6B2CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE centres_interets_profile ADD CONSTRAINT FK_17D8D6B2D9E5D9C9 FOREIGN KEY (centres_interets_id) REFERENCES centres_interets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profile_competences DROP FOREIGN KEY FK_CE3D31B0CCFA12B8');
        $this->addSql('ALTER TABLE profile_competences DROP FOREIGN KEY FK_CE3D31B0A660B158');
        $this->addSql('DROP TABLE profile_competences');
    }
}
