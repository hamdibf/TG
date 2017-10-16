<?php

namespace App\Controllers;

use Slim\Http\Response;

abstract class Controller
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function request($method, $uri = '', array $options = [])
    {
        return $this
            ->container
            ->http
            ->request($method, $uri, $options)
            ->getBody()
            ->getContents();
    }

    public function render(Response $response, $file, array $args = [])
    {
        $this
            ->container
            ->view
            ->render($response, $file, $args);
    }

    public function pathFor($name, $args = [])
    {
        return $this
            ->container
            ->get('router')
            ->pathFor($name, $args);
    }
}