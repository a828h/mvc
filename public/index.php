<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

/**
 * Composer
 */
require '../vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
//$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->get('devices', ['controller' => 'Devices', 'action' => 'index']);
$router->post('devices', ['controller' => 'Devices', 'action' => 'store']);
$router->get('locations', ['controller' => 'Locations', 'action' => 'index']);
$router->post('locations', ['controller' => 'Locations', 'action' => 'store']);
$router->dispatch(ltrim($_SERVER['REQUEST_URI'], '/'));
