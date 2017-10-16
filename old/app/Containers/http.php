<?php

$container['http'] = function () {
    $client = new \GuzzleHttp\Client();
    return $client;
};