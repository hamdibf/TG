<?php


use App\Controllers\UsersController;

$app->get('/connexion', UsersController::class . ':login')->setName('users_login');
$app->get('/nouveau-client', UsersController::class . ':create')->setName('users_create');
$app->get('/temoignages', UsersController::class . ':testimonies')->setName('users_testimonies');
$app->get('/espace-client', UsersController::class . ':index')->setName('users_index');
$app->get('/espace-client-coordonnees', UsersController::class . ':addresses')->setName('users_addresses');
$app->get('/espace-client-mesures', UsersController::class . ':measures')->setName('users_measures');
$app->get('/mesure-rapide', UsersController::class . ':quickMeasures')->setName('users_quick_measures');
$app->get('/mesurez-vous', UsersController::class . ':yourMeasures')->setName('users_your_measures');
$app->post('/mesurez-vous', UsersController::class . ':yourMeasuresPost')->setName('users_your_measures_post');
$app->get('/mesure-chemise', UsersController::class . ':shirtMeasures')->setName('users_shirt_measures');
$app->get('/vos-coordonnees', UsersController::class . ':yourAddress')->setName('users_your_address');
$app->post('/vos-coordonnees', UsersController::class . ':yourAddressPost')->setName('users_your_address_post');

$app->get('/customer/{id:[0-9]+}', UsersController::class . ':findById');