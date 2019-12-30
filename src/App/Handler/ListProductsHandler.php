<?php

namespace App\Handler;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class ListProductsHandler implements RequestHandlerInterface
{

    /** @var TemplateRendererInterface */
    private $templateRenderer;

    /** @var EntityManager */
    private $entityManager;

    /**
     * ListProductsHandler constructor.
     *
     * @param TemplateRendererInterface $templateRenderer
     * @param EntityManager $entityManager
     */
    public function __construct(TemplateRendererInterface $templateRenderer, EntityManager $entityManager)
    {
        $this->templateRenderer = $templateRenderer;
        $this->entityManager = $entityManager;
    }

    /**
     * Handles a request and produces a response.
     *
     * May call other collaborating code to generate the response.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $productRepository = $this->entityManager->getRepository(Product::class);
        $data['productList'] = $productRepository->findAll();

        return new HtmlResponse($this->templateRenderer->render('app::list-products', $data));
    }
}
