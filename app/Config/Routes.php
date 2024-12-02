<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeControleur::index');

$routes->get('/connexion', 'LoginController::index');

$routes->post('/connexion', 'LoginController::connexion');
