<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact-our-company', 'PagesController@contact');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
$router->get('users/create', 'UsersController@create');
$router->get('users/{id}', 'UsersController@show');
$router->put('users/{id}', 'UsersController@update');
$router->delete('users/{id}', 'UsersController@destroy');
$router->get('users/{id}/edit', 'UsersController@edit');
