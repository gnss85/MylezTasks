<?php declare(strict_types=1);

namespace AdministrationTaskEntity\Core\Content\Question;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Content\Product\ProductDefinition;

class QuestionDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'patrick_question';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return QuestionCollection::class;
    }

    public function getEntityClass(): string
    {
        return QuestionEntity::class;
    }

    public function getHydratorClass(): string
    {
        return QuestionHydrator::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new ApiAware(), new Required()),
            (new LongTextField('question', 'question'))->addFlags(new ApiAware(), new Required()),
            (new LongTextField('answer', 'answer'))->addFlags(new ApiAware()),
            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new ApiAware(), new Required()),
            (new ManyToOneAssociationField
            ('product',
             'product_id',
              ProductDefinition::class,
              'id',
              false
            )
            ),
        ]);
    }
}