<?php declare(strict_types=1);

namespace AdministrationTaskEntity\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1698531563 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1698531563;
    }

    public function update(Connection $connection): void
    {
        $connection->exec(
            "CREATE TABLE IF NOT EXISTS `patrick_question` (
                `id` BINARY(16) NOT NULL,
                `question` LONGTEXT NOT NULL,
                `answer` LONGTEXT NULL,
                `product_id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3),
                `updated_at` DATETIME(3),
                PRIMARY KEY (`id`),
                KEY `fk.patrick_question.product_id` (`product_id`),
                CONSTRAINT `fk.patrick_question.product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
        );
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
