<?php
session_start();
require '../vendor/autoload.php';

use \Slim\Http\Request;
use \Slim\Http\Response;
use \App\Models\User;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// Security
//$app->add(new \Slim\Csrf\Guard);

// Containers
$container = $app->getContainer();

require('../app/Containers/view.php');
require('../app/Containers/logger.php');
require('../app/Containers/http.php');

// Routes
require('../app/Routes/pages.php');
require('../app/Routes/users.php');
require('../app/Routes/shirts.php');
require('../app/Routes/fabrics.php');
require('../app/Routes/orders.php');

/**
 * Import CSRF  / Header protections
 */


$user = new User();



$app->run();