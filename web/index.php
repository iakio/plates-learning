<?php
// web/index.php
require_once __DIR__ .'/../vendor/autoload.php';

$app = new Silex\Application();

$app['view'] = $app->share(function () {
    return new League\Plates\Engine(__DIR__ . '/../templates');
});

$app->get('/', function () use ($app) {
    return $app['view']->render('home', ['title' => 'Hello']);
});
$app->run();
