<?php
// web/index.php
require_once __DIR__ .'/../vendor/autoload.php';

$app = new App();

$app->get('/', function () use ($app) {
    return $app['view']->render('home');
});
$app->get('help', function () use ($app) {
    return $app['view']->render('help');
});
$app->get('about', function () use ($app) {
    return $app['view']->render('about');
});
$app->get('contact', function () use ($app) {
    return $app['view']->render('contact');
});
$app->run();
