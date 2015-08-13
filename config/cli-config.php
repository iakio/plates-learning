<?php
use Doctrine\DBAL\Tools\Console\ConsoleRunner;

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../src/app.php';

return ConsoleRunner::createHelperSet($app['db']);
