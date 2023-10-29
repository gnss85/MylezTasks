<?php declare(strict_types=1);

namespace AdministrationTaskEntity\Storefront\Controller;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use AdministrationTaskEntity\Core\Content\Question\SalesChannel\AbstractQuestionRoute;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(defaults={"_routeScope"={"storefront"}})
 */
class QuestionController extends StorefrontController
{
    private AbstractQuestionRoute $route;

    public function __construct(AbstractQuestionRoute $route)
    {
        $this->route = $route;
    }

    /**
     * @Route("/question", name="frontend.question.search", methods={"GET", "POST"}, defaults={"XmlHttpRequest"=true})
     */
    public function load(Criteria $criteria, SalesChannelContext $context): Response
    {
        return $this->route->load($criteria, $context);
    }
}