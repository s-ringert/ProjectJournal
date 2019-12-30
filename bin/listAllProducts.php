<?php

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
/** @var \Psr\Container\ContainerInterface $container */
$container = require 'config/container.php';
/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = $container->get(\Doctrine\ORM\EntityManager::class);

$productRepository = $entityManager->getRepository('App\Entity\Product');
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo sprintf("-%s\n", $product->getName());
}