<?php

use App\App;

require_once __DIR__ . '/vendor/autoload.php';

$app = new App();

echo $app->index() . '<br />';
