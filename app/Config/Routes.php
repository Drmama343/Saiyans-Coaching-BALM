<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->match(['GET', 'POST'], '/connexion', 'LoginController::connexion');

$routes->match(['GET', 'POST'], '/forgotpwd', 'LoginController::forgotpwd');
$routes->match(['GET', 'POST'], '/resetpwd/(:any)', 'LoginController::resetpwd/$1');

$routes->get('/logout', 'LoginController::logout');

$routes->get('/inscription', 'LoginController::index');
$routes->post('/inscription', 'LoginController::inscription');

$routes->get('/programme','ProgrammeController::index');

$routes->get('/profil', 'ProfilController::index'); 
$routes->match(['GET', 'POST'], '/modifProfil/(:any)', 'ProfilController::modifierProfil/$1');

$routes->get('/apropos', 'AproposController::index');

$routes->get('/avant-apres', 'AvantApresController::index');

$routes->get('/blog', 'BlogController::index');

$routes->get('/actualite', 'ActualiteController::index');

$routes->get('/contact', 'ContactController::index');
$routes->post('/contact', 'ContactController::sendMail');

$routes->get('/admin', 'AdminController::index');

$routes->get('/admin/article', 'AdminController::article');

$routes->get('/questionadmin', 'AdminController::question');
$routes->match(['GET', 'POST'], '/modifQuestion/(:any)', 'AdminController::modifierQuestion/$1');
$routes->match(['GET', 'POST'], '/creerQuestion', 'AdminController::creerQuestion');
$routes->match(['GET', 'POST'], '/supprimerQuestion/(:any)', 'AdminController::supprimerQuestion/$1');

$routes->get('/saiyanadmin', 'AdminController::saiyan');
$routes->match(['GET', 'POST'], '/modifSaiyan/(:any)', 'AdminController::modifierSaiyan/$1');
$routes->match(['GET', 'POST'], '/creerSaiyan', 'AdminController::creerSaiyan');
$routes->match(['GET', 'POST'], '/supprimerSaiyan/(:any)', 'AdminController::supprimerSaiyan/$1');