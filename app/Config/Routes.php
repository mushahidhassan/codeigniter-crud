<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //$route['default_controller'] = 'ApiController';
 //$routes->get('/', 'Home::index');


// Setting routes for all calls for Company Controller 
//$routes->get('/companies', 'CompanyController::index');
$routes->get('/', 'CompanyController::index');
$routes->get('/companies/create', 'CompanyController::create');
$routes->post('/companies/store', 'CompanyController::store');
$routes->get('/companies/edit/(:num)', 'CompanyController::edit/$1');
$routes->post('/companies/update', 'CompanyController::update');
$routes->get('/companies/delete/(:num)', 'CompanyController::delete/$1');


//$routes->get('companies/fetch-api-data', 'CompanyController::fetchApiData');
//$routes->post('companies/store-api-data', 'CompanyController::storeApiData');

// Setting routes for all calls for API Controller 
$routes->get('api/fetch', 'ApiDataController::fetchData');
$routes->post('api/store', 'ApiDataController::storeData');
$routes->post('api/check', 'ApiDataController::loadDataView');

$routes->get('api/load', 'ApiDataController::loadDataView');
$routes->get('api/edit/(:num)', 'ApiDataController::edit/$1');
$routes->post('api/update/(:num)', 'ApiDataController::update/$1');
$routes->get('api/delete/(:num)', 'ApiDataController::delete/$1');

// Setting routes for all calls for Employee Controller 
$routes->get('/employees/index/(:num)', 'EmployeeController::index/$1');
$routes->get('/employees/create/(:num)', 'EmployeeController::create/$1');
$routes->post('/employees/store/(:num)', 'EmployeeController::store/$1');
$routes->get('/employees/edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('/employees/update', 'EmployeeController::update');
$routes->get('/employees/delete/(:num)/(:num)', 'EmployeeController::delete/$1/$2');

