<?php

session_start();

use Core\App;
use Illuminate\Database\Capsule\Manager as Capsule;

App::bind('config', require '../config.php');

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => App::get('config')['database']['driver'],
    'host'      => App::get('config')['database']['host'],
    'database'  => App::get('config')['database']['database'],
    'username'  => App::get('config')['database']['username'],
    'password'  => App::get('config')['database']['password'],
    'charset'   => App::get('config')['database']['charset'],
    'collation' => App::get('config')['database']['collation'],
    'prefix'    => App::get('config')['database']['prefix'],
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

$capsule->bootEloquent();

