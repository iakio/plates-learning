<?php
$app = new Silex\Application();
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
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
$app['static_pages.controller'] = function () use ($app) {
    return new StaticPagesController($app['view']);
};

$app->get('/',       'static_pages.controller:home');
$app->get('help',    'static_pages.controller:help');
$app->get('about',   'static_pages.controller:about');
$app->get('contact', 'static_pages.controller:contact');

return $app;
