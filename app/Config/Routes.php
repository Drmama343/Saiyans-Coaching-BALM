<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Routes pour la page d'accueil
$routes->get('/', 'HomeController::index');
$routes->get('/cgv', 'HomeController::cgv');

// Routes pour la connexion
$routes->match(['GET', 'POST'],'/connexion', 'LoginController::connexion');
$routes->post('/forgotpwd', 'LoginController::forgotpwd');
$routes->post('/resetpwd/(:any)', 'LoginController::resetpwd/$1');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/inscription', 'LoginController::index');
$routes->post('/inscription', 'LoginController::inscription');

// Routes pour les programmes
$routes->get('/programme','ProgrammeController::index');


// Routes pour le profil
$routes->group('', ['filter' => 'ConnexionGuard'], function($routes) {
	$routes->get('/profil', 'ProfilController::index'); 
	$routes->post('/modifProfil/(:any)', 'ProfilController::modifierProfil/$1');
	$routes->post('/supprimerProfil/(:any)', 'ProfilController::supprimerProfil/$1');
	$routes->get('temoignage/(:num)', 'ProfilController::modifier/$1');
	$routes->post('modifTemoignage/(:num)', 'ProfilController::modifTemoignage/$1');
	$routes->get('supprTemoignage/(:num)', 'ProfilController::supprTemoignage/$1');
	$routes->post('supprImageTemoignage/(:num)', 'ProfilController::supprImageTemoignage/$1');

	$routes->post('/ajoutTemoignage/(:any)', 'AvantApresController::ajoutTemoignage/$1');

	$routes->get('/programme/achat/(:num)','ProgrammeController::achat/$1');
});

// Routes pour la page à propos
$routes->get('/apropos', 'AproposController::index');

// Routes pour la page avant-apres
$routes->get('/avant-apres', 'AvantApresController::index');

// Routes pour les articles
$routes->group('', ['filter' => 'AbonnementMultimediaGuard'], function($routes) {
	$routes->get('/blog', 'BlogController::index');
});
$routes->get('/actualite', 'ActualiteController::index');

// Routes pour la page contact
$routes->get('/contact', 'ContactController::index');
$routes->post('/contact', 'ContactController::sendMail');

$routes->group('', ['filter' => 'AdminGuard'], function($routes) {
	//Routes pour les statistiques
	$routes->get('/admin', 'AdminController::index');

	// Routes pour les Programmes version admin
	$routes->get('/admin/programme', 'AdminController::programme');
	$routes->post('/admin/programme/ajouter', 'AdminController::ajoutProgramme');
	$routes->post('admin/modifProgramme/(:num)', 'AdminController::modifProgramme/$1');
	$routes->get('admin/supprProgramme/(:num)', 'AdminController::supprProgramme/$1');
	$routes->post('/admin/rechercherProgramme', 'AdminController::setRechercheProgramme');

	// Routes pour les Promotions
	$routes->post('admin/promotion/ajouter', 'AdminController::ajoutPromotion');
	$routes->post('admin/modifPromotion/(:num)', 'AdminController::modifPromotion/$1');
	$routes->get('admin/supprPromotion/(:num)', 'AdminController::supprPromotion/$1');
	$routes->post('/admin/rechercherPromotion', 'AdminController::setRecherchePromotion');

	// Routes pour les Articles
	$routes->get('/admin/article', 'AdminController::article');
	$routes->post('/admin/article/ajouter', 'AdminController::ajoutArticle');
	$routes->post('/admin/modifArticle/(:num)', 'AdminController::modifArticle/$1');
	$routes->get('/admin/supprArticle/(:num)', 'AdminController::supprArticle/$1');
	$routes->post('/admin/supprImageArticle/(:num)', 'AdminController::supprImageArticle/$1');
	$routes->post('/admin/rechercherArticle', 'AdminController::setRechercheArticle');

	// Routes pour les Temoignages
	$routes->get('/admin/temoignage', 'AdminController::temoignage');
	$routes->post('admin/modifTemoignage/(:num)', 'AdminController::modifTemoignage/$1');
	$routes->get('admin/supprTemoignage/(:num)', 'AdminController::supprTemoignage/$1');
	$routes->post('/admin/rechercherTemoignage', 'AdminController::setRechercheTemoignage');

	// Routes pour les Questions
	$routes->get('/admin/question', 'AdminController::question');
	$routes->post('/admin/modifQuestion/(:num)', 'AdminController::modifierQuestion/$1');
	$routes->post('/admin/creerQuestion', 'AdminController::creerQuestion');
	$routes->get('/admin/supprQuestion/(:num)', 'AdminController::supprQuestion/$1');
	$routes->post('/admin/rechercherQuestion', 'AdminController::setRechercheQuestion');

	// Routes pour les Saiyans
	$routes->get('/admin/saiyan', 'AdminController::saiyan');
	$routes->post('/admin/rechercherSaiyan', 'AdminController::setRechercheSaiyan');
	$routes->post('/admin/rechercherSaiyanStats', 'AdminController::setRechercheSaiyanStats');

	//Routes générales pour modifier ou ajouter des éléments
	$routes->get('/admin/(:any)/(:num)', 'AdminController::modifier/$1/$2');
	$routes->get('/admin/(:any)/ajouter', 'AdminController::ajouter/$1');
});