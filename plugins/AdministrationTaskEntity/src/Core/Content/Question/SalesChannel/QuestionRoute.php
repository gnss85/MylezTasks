<?php declare(strict_types=1);

namespace AdministrationTaskEntity\Core\Content\Question\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Plugin\Exception\DecorationPatternException;
use Shopware\Core\Framework\Routing\Annotation\Entity;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(defaults={"_routeScope"={"store-api"}})
 */
class QuestionRoute extends AbstractQuestionRoute
{
    protected EntityRepository $questionRepository;

    public function __construct(EntityRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function getDecorated(): AbstractQuestionRoute
    {
        throw new DecorationPatternException(self::class);
    }

    /**
     * @Entity("patrick_question")
     * @Route("/store-api/question", name="store-api.question.search", methods={"GET", "POST"})
     */
    public function load(Criteria $criteria, SalesChannelContext $context): QuestionRouteResponse
    {
        return new QuestionRouteResponse($this->questionRepository->search($criteria, $context->getContext()));
    }
}