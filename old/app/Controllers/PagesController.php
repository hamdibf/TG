<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class PagesController extends Controller
{
    public function index(Request $request, Response $response)
    {

        $this->render($response, 'pages/index.twig');
    }

    public function contact(Request $request, Response $response)
    {
        $this->render($response, 'pages/contact.twig');
    }



}