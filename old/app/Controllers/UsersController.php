<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use \App\Models\User;

class UsersController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $this->render($response, 'users/index.twig');
    }

    public function create(Request $request, Response $response)
    {
        $this->render($response, 'users/create.twig');
    }

    public function login(Request $request, Response $response)
    {
        $this->render($response, 'users/login.twig');
    }

    public function testimonies(Request $request, Response $response)
    {
        $this->render($response, 'users/testimonies.twig');
    }

    public function measures(Request $request, Response $response)
    {
        $this->render($response, 'users/measures.twig');
    }

    public function addresses(Request $request, Response $response)
    {
        $this->render($response, 'users/addresses.twig');
    }

    public function yourAddress(Request $request, Response $response)
    {
        $this->render($response, 'users/your-address.twig');
    }

    public function yourAddressPost(Request $request, Response $response)
    {
        $post = $request->getParsedBody();

        $user = new User($post['nom'], $post['prenom'], $post['societe'], $post['number'], $post['adresse'], '',
            $post['code-postal'], $post['ville'], '', $post['renseignement'], '', $_SESSION['measures']['age'],
            $_SESSION['measures']['poids'], $_SESSION['measures']['taille'], $_SESSION['measures']['cou'],
            $_SESSION['measures']['poitrine'], $_SESSION['measures']['ceinture'],
            $_SESSION['measures']['carrure'], $_SESSION['measures']['dos'], $_SESSION['measures']['poignet'], $_SESSION['measures']['bras']);
        $user->save();
    }

    public function findById(Request $request, Response $response, $args)
    {
        $user = new User();
        echo '<pre>';
        var_dump($user->findById($args['id']));
        echo '</pre>';
    }

    public function yourMeasures(Request $request, Response $response)
    {
        $this->render($response, 'users/your-measures.twig');
    }

    public function yourMeasuresPost(Request $request, Response $response)
    {
        $_SESSION['measures'] = $request->getParsedBody();
        return $response->withRedirect($this->pathFor('users_your_address'));
    }

    public function quickMeasures(Request $request, Response $response)
    {
        $this->render($response, 'users/quick-measures.twig');
    }

    public function shirtMeasures(Request $request, Response $response)
    {
        $this->render($response, 'users/shirt-measures.twig');
    }
}