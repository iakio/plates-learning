<?php
// web/index.php
require_once __DIR__ .'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () {
    $templates = new League\Plates\Engine(__DIR__ . '/../templates');
    return $templates->render('home', ['title' => 'Hello']);
});
$app->run();
