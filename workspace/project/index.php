<?php

require __DIR__ . '/vendor/autoload.php';

// initiate app
$app = new \Slim\App;

$app->get('/', function () {
	echo 'hello from SLIM Framework';
});

$app->run();
?>
