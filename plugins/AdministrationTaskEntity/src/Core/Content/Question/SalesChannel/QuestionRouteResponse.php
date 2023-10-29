<?php declare(strict_types=1);

namespace AdministrationTaskEntity\Core\Content\Question\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\System\SalesChannel\StoreApiResponse;
use AdministrationTaskEntity\Core\Content\Question\QuestionCollection;

/**
 * Class QuestionRouteResponse
 * @property EntitySearchResult $object
 */
class QuestionRouteResponse extends StoreApiResponse
{
    public function getQuestions(): QuestionCollection
    {
        /** @var QuestionCollection $collection */
        $collection = $this->object->getEntities();

        return $collection;
    }
}