<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'My Phonebook');

session_start();

$router = new \Bramus\Router\Router();

// Auth routes
$router->get('/logout', '\App\Controllers\Auth\LoginController@logout');
$router->get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@register');
$router->get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
$router->post('/login', '\App\Controllers\Auth\LoginController@login');

// home
$router->get('/', '\App\Controllers\PostController@index'); 
$router->get('/home', '\App\Controllers\PostController@index');

// post
$router->post('/newPost', '\App\Controllers\PostController@newPost');
$router->get('/newPost', '\App\Controllers\PostController@newPost');
$router->get('/deletePost?.*', '\App\Controllers\PostController@deletePost');

// like post
$router->post('/likePost', '\App\Controllers\PostController@likePost');
$router->post('/unLikePost', '\App\Controllers\PostController@unLikePost');

// star comment
$router->post('/starUser', '\App\Controllers\PostController@star');
$router->post('/unstarUser', '\App\Controllers\PostController@unstar');
$router->get('/starUser', '\App\Controllers\PostController@star');



// comment
$router->post('/addComment', '\App\Controllers\PostController@addComment');


$router->set404('\App\Controllers\Controller@sendNotFound');

$router->run();
