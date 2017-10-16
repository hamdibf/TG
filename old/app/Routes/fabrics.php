<?php

use \App\Controllers\FabricsController;

$app->get('/catalogue-tissus', FabricsController::class . ':index')->setName('fabrics_index');
$app->post('/findAll', FabricsController::class . ':findAll');

