<?php

namespace App\Entity\Manager;

class EntityManagerFactory implements \Zend\ServiceManager\Factory\FactoryInterface
{
    public function __invoke(
        \Interop\Container\ContainerInterface $container,
        $requestedName,
        ?array $options = null
    ) {
        $appConfig = $container->get('config');
        if (isset($appConfig['dbConfig']) === false) {
            throw new \InvalidArgumentException('no db config provided');
        }

        $config = \Doctrine\ORM\Tools\Setup::createXMLMetadataConfiguration(
            array(__DIR__ . "/../../../../config/xml")
        );
        $entityManager = \Doctrine\ORM\EntityManager::create(
            $appConfig['dbConfig'],
            $config
        );
        return $entityManager;
    }
}
