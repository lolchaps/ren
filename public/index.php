<?php

use Core\Request;
use Core\Router;

require '../vendor/autoload.php';
require '../core/bootstrap.php';

try {
    Router::load('../app/routes.php')
        ->direct(Request::uri(), Request::method());
} catch (Exception $e) {
    echo $e->getMessage();
}

