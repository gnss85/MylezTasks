<?php declare(strict_types=1);

namespace AdministrationTaskEntity\Core\Content\Question;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Dbal\EntityHydrator;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\Uuid\Uuid;
use DateTimeImmutable;

class QuestionHydrator extends EntityHydrator
{
    protected function assign(EntityDefinition $definition, Entity $entity, string $root, array $row, Context $context): Entity
    {
        if (isset($row[$root . '.id'])) {
            $entity->id = Uuid::fromBytesToHex($row[$root . '.id']);
        }

        if (isset($row[$root . '.question'])) {
            $entity->question = $row[$root . '.question'];
        }

        if (isset($row[$root . '.answer'])) {
            $entity->answer = $row[$root . '.answer'];
        }

        if (isset($row[$root . '.product_id'])) {
            $entity->productId = $row[$root . '.product_id'];
        }

        if (isset($row[$root . '.createdAt'])) {
            $entity->createdAt = new DateTimeImmutable($row[$root . '.createdAt']);
        }

        if (isset($row[$root . '.updatedAt'])) {
            $entity->updatedAt = new DateTimeImmutable($row[$root . '.updatedAt']);
        }

        return $entity;
    }
}