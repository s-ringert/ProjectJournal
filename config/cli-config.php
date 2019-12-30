<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
/** @var \Psr\Container\ContainerInterface $container */
$container = require 'config/container.php';


/* @var $entityManager Doctrine\ORM\EntityManager */
$entityManager = $container->get(Doctrine\ORM\EntityManager::class);

return ConsoleRunner::createHelperSet($entityManager);