<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PizzaController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'CarteController::index');

$routes->get('/pizzas', 'PizzaController::index');
$routes->get('/pizza/create', 'PizzaController::create');
$routes->get('/pizza/delete/(:num)', 'PizzaController::delete/$1');
$routes->post('/pizza/save', 'PizzaController::save');
$routes->get('/pizza/edit/(:num)', 'PizzaController::edit/$1');
$routes->post('/pizza/save/(:num)', 'PizzaController::save/$1');
//
$routes->get('/ingredients', 'IngredientController::index');
$routes->get('/ingredient/create', 'IngredientController::create');
$routes->get('/ingredient/delete/(:num)', 'IngredientController::delete/$1');
$routes->post('/ingredient/save', 'IngredientController::save');
$routes->get('/ingredient/edit/(:num)', 'IngredientController::edit/$1');
$routes->post('/ingredient/save/(:num)', 'IngredientController::save/$1');
//
$routes->get('/pizza/ingredients/(:num)', 'GarnitureController::index/$1');
$routes->get('/pizza/ingredient/create/(:num)', 'GarnitureController::create/$1');
$routes->get('/pizza/ingredient/delete/(:num)', 'GarnitureController::delete/$1');
$routes->post('/pizza/ingredient/save', 'GarnitureController::save');
$routes->get('/pizza/ingredient/edit/(:num)', 'GarnitureController::edit/$1');
$routes->post('/pizza/ingredient/save/(:num)', 'GarnitureController::save/$1');
//
$routes->get('/carte', 'CarteController::index');
$routes->get('/panier','PanierController::index');
$routes->get('/panier/create/(:num)','PanierController::add/$1');
$routes->get('/panier/qty/Inc/(:any)','PanierController::add/$1');
$routes->get('/panier/qty/Dec/(:any)','PanierController::Dec/$1/$1/$1/$1/$1');
$routes->get('/panier/item/delete/(:any)','PanierController::delete/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
