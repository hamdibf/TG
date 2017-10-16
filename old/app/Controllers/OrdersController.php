<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class OrdersController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $this->render($response, 'orders/index.twig', ['page' => 'index']);
    }

    public function measures(Request $request, Response $response)
    {
        $this->render($response, 'orders/measures.twig', ['page' => 'measures']);
    }

    public function address(Request $request, Response $response)
    {
        $this->render($response, 'orders/address.twig', ['page' => 'address']);
    }

    public function payment(Request $request, Response $response)
    {
        $this->render($response, 'orders/payment.twig', ['page' => 'payment']);
    }
}