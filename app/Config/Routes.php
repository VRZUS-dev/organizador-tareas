<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->get('/registro', 'Home::registro');
$routes->post('/registro/guardar', 'Home::guardarRegistro');
$routes->get('login', 'Home::login');
$routes->post('login/ingresar', 'Home::ingresar');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('salir', 'Dashboard::salir');
$routes->post('dashboard/guardarTarea', 'Dashboard::guardarTarea');
$routes->get('dashboard/completar/(:num)', 'Dashboard::completarTarea/$1');
$routes->get('dashboard/eliminar/(:num)', 'Dashboard::eliminarTarea/$1');
