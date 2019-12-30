<?php
declare(strict_types=1);

namespace App;

use App\Handler\DemoPageHandler;
use App\Handler\DemoPageHandlerFactory;
use App\Handler\ListProductsHandler;
use App\Handler\ListProductsHandlerFactory;
use Doctrine\ORM\EntityManager;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{

    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
            ],
            'factories' => [
                Handler\DemoJsonHandler::class => Handler\DemoJsonHandlerFactory::class,
                DemoPageHandler::class => DemoPageHandlerFactory::class,
                EntityManager::class => Entity\Manager\EntityManagerFactory::class,
                ListProductsHandler::class => ListProductsHandlerFactory::class,

            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'app' => ['templates/app'],
                'error' => ['templates/error'],
                'layout' => ['templates/layout'],
            ],
        ];
    }
}
