<?php

use \App\Controllers\OrdersController;

$app->get('/panier', OrdersController::class . ':index')->setName('orders_index');
$app->get('/panier/mesures', OrdersController::class . ':measures')->setName('orders_measures');
$app->get('/panier/coordonnees', OrdersController::class . ':address')->setName('orders_address');
$app->get('/panier/recapitulatif', OrdersController::class . ':payment')->setName('orders_payment');

