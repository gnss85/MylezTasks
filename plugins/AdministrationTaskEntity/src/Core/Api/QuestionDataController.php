<?php declare(strict_types=1);

use Faker\Factory;
use Shopware\Core\Framework\Routing\RouteScope;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;
use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException;
use Shopware\Core\Framework\Context;
use Shopware\Core\Content\Product\Exception\ProductNotFoundException;


/**
 * @RouteScope(scopes={"api"})
 */
class QuestionDataController extends AbstractController
{
    /**
     * @var EntityRepository
     */
    private $productRepository;

    /**
     * @var EntityRepository
     */
    private $questionRepository;

    public function __construct(EntityRepository $productRepository, EntityRepository $questionRepository)
    {
        $this->productRepository = $productRepository;
        $this->questionRepository = $questionRepository;
    }

    /**
     * @Route("/api/v{version}/_action/patrick-question/generate", name="api.custom.patrick_question.generate", methods={"POST"})
     * @param Context $context
     * @return Response
     * @throws ProductNotFoundException
     * @throws InconsistentCriteriaIdsException
     */
    public function generate(Context $context): Response
    {
        $faker = Factory::create();
        // $product = $this->

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'id' => Uuid::randomHex(),
                'question' => $faker->sentence(15), //Question
                'answer' => $faker->sentence(40), //Answer
                'productId' => '2a88d9b59d474c7e869d8071649be43c',
            ];
        }
        $this->QuestionRepository->create($data, $context);

        return new Response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Context $context
     * @return ProductEntity
     * @throws ProductNotFoundException
     * @throws InconsistentCriteriaIdsException
     */
    private function getActiveProduct(Context $context): ProductEntity
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('active', '1'));
        $criteria->setLimit(1);

        $product = $this->productRepository->search($criteria, $context)->getEntities()->first();
        if($product === null){
            throw new ProductNotFoundException('');
        }

        return $product;
    }
}