<?php declare(strict_types=1);

namespace AdministrationTaskEntity\Core\Content\Question\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

abstract class AbstractQuestionRoute
{
    abstract public function getDecorated(): AbstractQuestionRoute;

    abstract public function load(Criteria $criteria, SalesChannelContext $context): QuestionRouteResponse;
}