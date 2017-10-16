<?php

use \App\Controllers\ShirtsController;

$app->get('/catalogue-chemises', ShirtsController::class . ':index')->setName('shirts_index');
$app->get('/creer-votre-chemise-sur-mesure', ShirtsController::class . ':configurator')->setName('shirts_configurator');
$app->get('/getButtons', ShirtsController::class . ':getButtons');
$app->get('/getButtonholes', ShirtsController::class . ':getButtonholes');
$app->get('/getTemplates/{id}', ShirtsController::class . ':getTemplates');
