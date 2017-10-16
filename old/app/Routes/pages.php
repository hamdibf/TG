<?php

use \App\Controllers\PagesController;

$app->get('/', PagesController::class . ':index')->setName('pages_index');
$app->get('/contact', PagesController::class . ':contact')->setName('pages_contact');

