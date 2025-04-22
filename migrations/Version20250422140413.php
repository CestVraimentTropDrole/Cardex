<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422140413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE card ADD quantity INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB0795FF5BA6F
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D33BB0795FF5BA6F ON exchange
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exchange CHANGE card_received_id card_recieved_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exchange ADD CONSTRAINT FK_D33BB079CFFAC554 FOREIGN KEY (card_recieved_id) REFERENCES card (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D33BB079CFFAC554 ON exchange (card_recieved_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE extension CHANGE code code VARCHAR(15) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE card DROP quantity
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB079CFFAC554
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D33BB079CFFAC554 ON exchange
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exchange CHANGE card_recieved_id card_received_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exchange ADD CONSTRAINT FK_D33BB0795FF5BA6F FOREIGN KEY (card_received_id) REFERENCES card (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D33BB0795FF5BA6F ON exchange (card_received_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE extension CHANGE code code VARCHAR(16) NOT NULL
        SQL);
    }
}
