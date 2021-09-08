<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use AutomataApp\CellularAutomata;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/api/automata', function (Request $request, Response $response) {
    $params = $request->getQueryParams();
    $cells = $params['cells'];
    $rule = $params['rule'];
    $steps = $params['steps'];
    $cellularAutomata = new CellularAutomata();
    $response->getBody()->write($cellularAutomata->step($cells, $rule, $steps));
    $response = $response->withStatus(200);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();