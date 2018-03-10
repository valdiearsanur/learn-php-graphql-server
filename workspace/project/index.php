<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/MyApp.php';

// initiate app
$app = new MyApp;

global $container;
$container = $app->getContainer();

// Inject Resolver
$DIResolver = ProjectDependencyInjection\DIResolver::class;
$container->set($DIResolver, \DI\object()->constructor($container));

/* ROUTES */
require __DIR__ . '/routes.php';

$app->run();
?>
