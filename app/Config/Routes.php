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
$routes->match(['GET', 'POST'], '/supprimerProfil/(:any)', 'ProfilController::supprimerProfil/$1');

$routes->get('/apropos', 'AproposController::index');

$routes->get('/avant-apres', 'AvantApresController::index');
$routes->match(['GET', 'POST'], '/ajoutTemoignage/(:any)', 'AvantApresController::ajoutTemoignage/$1');

$routes->get('/blog', 'BlogController::index');

$routes->get('/actualite', 'ActualiteController::index');

$routes->get('/contact', 'ContactController::index');
$routes->post('/contact', 'ContactController::sendMail');

$routes->get('/admin', 'AdminController::index');

$routes->get('/admin/programme', 'AdminController::programme');
$routes->post('admin/ajoutProgramme', 'AdminController::ajoutProgramme');
$routes->post('admin/modifProgramme/(:any)', 'AdminController::modifProgramme/$1');
$routes->post('admin/supprProgramme/(:any)', 'AdminController::supprProgramme/$1');
$routes->post('admin/ajoutPromotion', 'AdminController::ajoutPromotion');
$routes->post('admin/modifPromotion/(:any)', 'AdminController::modifPromotion/$1');
$routes->post('admin/supprPromotion/(:any)', 'AdminController::supprPromotion/$1');

$routes->get('/admin/article', 'AdminController::article');
$routes->post('/admin/article/ajouter', 'AdminController::ajoutArticle');
$routes->post('/admin/modifArticle/(:any)', 'AdminController::modifArticle/$1');
$routes->post('/admin/supprArticle/(:any)', 'AdminController::supprArticle/$1');
$routes->match(['GET', 'POST'], '/admin/rechercherArticle', 'AdminController::setRechercheArticle');

$routes->get('/admin/temoignage', 'AdminController::temoignage');
$routes->match(['GET', 'POST'], 'admin/modifTemoignage/(:any)', 'AdminController::modifTemoignage/$1');
$routes->match(['GET', 'POST'], 'admin/supprTemoignage/(:any)', 'AdminController::supprTemoignage/$1');
$routes->match(['GET', 'POST'], '/admin/rechercherTemoignage', 'AdminController::setRechercheTemoignage');

$routes->get('/admin/question', 'AdminController::question');
$routes->match(['GET', 'POST'], '/admin/modifQuestion/(:any)', 'AdminController::modifierQuestion/$1');
$routes->match(['GET', 'POST'], '/admin/creerQuestion', 'AdminController::creerQuestion');
$routes->match(['GET', 'POST'], '/admin/supprimerQuestion/(:any)', 'AdminController::supprimerQuestion/$1');
$routes->match(['GET', 'POST'], '/admin/rechercherQuestion', 'AdminController::setRechercheQuestion');

$routes->get('/admin/saiyan', 'AdminController::saiyan');
$routes->match(['GET', 'POST'], '/admin/rechercherSaiyan', 'AdminController::setRechercheSaiyan');
$routes->match(['GET', 'POST'], '/admin/rechercherSaiyanStats', 'AdminController::setRechercheSaiyanStats');

$routes->get('/admin/(:any)/(:num)', 'AdminController::modifier/$1/$2');
$routes->get('/admin/(:any)/ajouter', 'AdminController::ajouter/$1');
