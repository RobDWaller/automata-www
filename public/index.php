<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use AutomataApp\CellularAutomata;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$twig = Twig::create(__DIR__ . '/../templates', ['cache' => false]);

$app->get('/{rule}', function (Request $request, Response $response, array $args) {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'rule.html', [
        'rule' => $args['rule']
    ]);
})->add(TwigMiddleware::create($app, $twig));;

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