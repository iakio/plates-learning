<?php

class App extends Silex\Application
{
    public function __construct()
    {
        parent::__construct();

        $app = $this;
        $app['view'] = $app->share(function () {
            $engine = new League\Plates\Engine(__DIR__ . '/../templates');
            $engine->registerFunction('full_title', function ($title) {
                $base_title = 'Ruby on Rails Tutorial';
                if (empty($title)) {
                    return $base_title;
                }
                return "$base_title | $title";
            });
            return $engine;
        });
    }
}
