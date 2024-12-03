<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/connexion', 'LoginController::index');
$routes->post('/connexion', 'LoginController::connexion');

$routes->get('/inscription', 'LoginController::index');
$routes->post('/inscription', 'LoginController::inscription');
