<?php

namespace App\Models;

use \GuzzleHttp\Client;

abstract class WSAdapter
{
    const STORE = 'TailorGeorge';
    const USER = 'tailorgeorge';
    const PASSWORD = 'Vb_830675';
    const URI = 'http://mtmconcept.fr/api/';

    private $token;
    private $id;
    private $client;
    private $logger;

    public function __construct()
    {
        $this->client = new Client();

        try {
            $result = $this->builder('POST', 'identification', [
                'user' => self::USER,
                'pass' => md5(self::PASSWORD)
            ]);

            if (isset($result->ERROR_IDENTIFICATION)) {
                echo 'Failed auth';
            } else {
                $this->token = $result->value->token;
                $this->id = $result->value->id;

            }
        } catch (\Exception $e) {
            die($e);
        }

    }

    public function findByName($name)
    {
        $result = $this->builder('POST', $this->id . '/' . $this->token . '/getclientbyname', ['nom' => $name]);

        if ($result && !isset($result->NO_CLIENT)) {
            return $result->client;
        } else {
            return false;
        }
    }

    public function findById($id)
    {
        $result = $this->builder('POST', $this->id . '/' . $this->token . '/getclientbynumero', ['numero' => $id]);

        if ($result && !isset($result->NO_CLIENT)) {
            return $result->value->client;
        } else {
            return false;
        }
    }

    public function createCustomer()
    {
        $values = [
            'nom' => $this->getName(),
            'prenom' => $this->getFirstName(),
            'societe' => $this->getCompany(),
            'telephone' => $this->getPhone(),
            'adresse' => $this->getAddress(),
            'adresse2' => $this->getAddress2(),
            'postal' => $this->getPostal(),
            'ville' => $this->getCity(),
            'pays' => $this->getName(),
            'renseignement' => $this->getInformation(),
            'email' => $this->getEmail(),
            'commentaire' => $this->getComment(),
            'age' => $this->getAge(),
            'poids' => $this->getWeight(),
            'taille' => $this->getHeight(),
            'cou' => $this->getNeck(),
            'poitrine' => $this->getChest(),
            'ceinture' => $this->getBelt(),
            'carrure' => $this->getShoulders(),
            'dos' => $this->getBack(),
            'poignet' => $this->getWrists(),
            'bras' => $this->getArms()
        ];

        $result = $this->builder('POST', $this->id . '/' . $this->token . '/newclient', $values);
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
    }

    public function updateCustomer($params = [])
    {
        $values = [
            'numeroClient' => '',
            'nom' => '',
            'prenom' => '',
            'societe' => '',
            'telephone' => '',
            'adresse' => '',
            'adresse2' => '',
            'postal' => '',
            'ville' => '',
            'pays' => '',
            'renseignement' => '',
            'email' => '',
            'commentaire' => '',
            'age' => '',
            'poids' => '',
            'taille' => '',
            'cou' => '',
            'poitrine' => '',
            'ceinture' => '',
            'carrure' => '',
            'dos' => '',
            'poignet' => '',
            'bras' => ''
        ];

        $result = $this->builder('POST', $this->id . '/' . $this->token . '/editclient', $params);
    }

    public function createOrder($params = [])
    {
        $values = [
            'numeroClient' => '',
            'TissuRef' => '',
            'TissuOppoColRef' => '',
            'TissuOppoPoignetRef' => '',
            'Col' => '',
            'Tenue' => '',
            'Baleine' => '',
            'Pied' => '',
            'Poignet' => '',
            'Dos' => '',
            'TypeEmpiecLibelle' => '',
            'Gorge' => '',
            'Bas' => '',
            'Epaulettes' => '',
            'Poche' => '',
            'BoutonLibelle' => '',
            'CoulBoutonniere' => '',
            'ArtInitiales' => '',
            'PositBrodLibelle' => '',
            'StyleBrod' => '',
            'CoulBrodLibelle' => '',
            'BroderieCol' => '',
            'StyleBroderieCol' => '',
            'CoulBroderieCol' => '',
            'EmpOppoCol' => '',
            'EmpOppoPoignet' => '',
            'ArtPoit' => '',
            'ArtCeint' => '',
            'ArtBassin' => '',
            'ArtEncolure' => '',
            'ArtMchG' => '',
            'ArtMchD' => '',
            'ArtProfEm' => '',
            'ArtBiceps' => '',
            'ArtDos' => '',
            'ArtPoD' => '',
            'ArtPoG' => '',
            'ArtCarrure' => '',
            'ArtRemarques' => '',
            'ArtQte' => ''

        ];

        $result = $this->builder('POST', $this->id . '/' . $this->token . '/newclient', $params);
    }


    private function builder($method, $uri, $params = [])
    {
        $result = $this
            ->client
            ->request($method, self::URI . $uri, ['form_params' => $params])
            ->getBody()
            ->getContents();

        if ($result) {
            return json_decode($result);
        } else {
            throw new \Exception('Problem during API request');
        }
    }
}