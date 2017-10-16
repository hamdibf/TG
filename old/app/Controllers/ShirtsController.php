<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class ShirtsController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $this->render($response, 'shirts/index.twig');
    }

    public function configurator(Request $request, Response $response)
    {
        $this->render($response, 'shirts/configurator.twig');
    }

    public function getButtons(Request $request, Response $response)
    {
        $response->write($this->request('GET', 'http://storage.tailorgeorge.com/api/getButtons/all/format/json', [
            'verify' => false,
            'allow_redirects' => true,
            'headers' => [
                'Authorization' => 'Bearer N0g9fKVS53INO5js0Dj4N0e26G06TtcA'
            ]
        ]));
    }

    public function getButtonholes(Request $request, Response $response)
    {
        $response->write($this->request('GET', 'http://storage.tailorgeorge.com/api/getLapels/all/format/json', [
            'headers' => [
                'Authorization' => 'Bearer N0g9fKVS53INO5js0Dj4N0e26G06TtcA'
            ]
        ]));
    }

    public function getTemplates(Request $request, Response $response, $args)
    {
        $response->write($this->request('GET', 'http://storage.tailorgeorge.com/api/getTemplates/' . $args['id'] . '/format/json', [
            'headers' => [
                'Authorization' => 'Bearer N0g9fKVS53INO5js0Dj4N0e26G06TtcA'
            ]
        ]));
    }
}