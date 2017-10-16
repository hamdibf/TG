<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;


class FabricsController extends Controller
{
    public function index(Request $request, Response $response)
    {

        // SET CACHE ON REQUESTS !

        $fabrics = json_decode($this->request('POST', 'http://mtmconcept.com/api/LS107/1cd3ec2903b1bb38663b04eccc965f79/tissus', [
            'form_params' => [
                'couleur' => '',
                'motif' => '',
                'tissage' => ''
            ]
        ]));


        $this->render($response, 'fabrics/index.twig', [
            'fabrics' => $fabrics->value,
            'count' => sizeof($fabrics->value)
        ]);
    }


    public function findAll(Request $request, Response $response)
    {
        $result = $this->request('POST', 'http://mtmconcept.com/api/LS107/1cd3ec2903b1bb38663b04eccc965f79/tissus', [
            'form_params' => [
                'couleur' => $request->getParsedBody()['couleur'],
                'motif' => $request->getParsedBody()['motif'],
                'tissage' => $request->getParsedBody()['tissage']
            ]
        ]);

        return $response->write($result);
    }
}