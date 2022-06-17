<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('login', new Route(constant('URL_SUBFOLDER') . '/admin/login', array('controller' => 'LoginController', 'method'=>'showAdminLogin'), array()));
$routes->add('dashboard', new Route(constant('URL_SUBFOLDER') . '/admin', array('controller' => 'PortalController', 'method'=>'showDashboard'), array()));