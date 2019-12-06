<?php
require 'vendor/autoload.php';
$app = new \Slim\App;

$app->get('/hello','toto');

$client = array();

function toto ($resquest,$response,$args) {
    return $response->write("yo");
}

function setHeader($response) {
    return $response->withHeader("Access-Control-Allow-Origin", "*")->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
}



function addClient($request,$response,$args) {
    
    $body = $request->getParsedBody(); // Parse le body
    
    $client->nom = $body['nom']; // Data du formulaire
    $client->prenom = $body['prenom'];
    $client->civilite = $body['civilite'];
    $client->telephone = $body['telephone'];
    $client->ville = $body['ville'];
    $client->adresse = $body['adresse'];
    $client->cp = $body['cp'];
    $client->pays = $body['pays'];
    $client->email = $body['email'];
    $client->login = $body['login'];
    $client->password = $body['password'];
}
function getClient($request,$response,$args) {
    return $response->write(json_encode($client));
}
$app->run();

