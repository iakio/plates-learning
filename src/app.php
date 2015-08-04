<?php
$app = new Silex\Application();

$app['view'] = $app->share(function () {
    $engine = new League\Plates\Engine(__DIR__ . '/../templates');
    $engine->addData(['title' => '']);
    $engine->registerFunction('full_title', function ($title) {
        $base_title = 'Ruby on Rails Tutorial';
        if (empty($title)) {
            return $base_title;
        }
        return "$base_title | $title";
    });
    return $engine;
});

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

return $app;
