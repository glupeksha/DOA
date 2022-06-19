<?php

use App\Auth;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();

//Portal routes
if(Auth::getUser() && Auth::getUser()->getIsAdmin()){
    $routes->add('dashboard', new Route(constant('URL_SUBFOLDER') . '/admin', array('controller' => 'PortalController', 'method'=>'showDashboard'), array()));
    $routes->add('inquiries', new Route(constant('URL_SUBFOLDER') . '/admin/inquiries', array('controller' => 'PortalController', 'method'=>'showInquiries'), array()));
    $routes->add('users', new Route(constant('URL_SUBFOLDER') . '/admin/users', array('controller' => 'PortalController', 'method'=>'showUsers'), array()));    
}

//Website routes
$routes->add('register', new Route(constant('URL_SUBFOLDER') . '/register', array('controller' => 'WebController', 'method'=>'showRegister'), array()));
$routes->add('login', new Route(constant('URL_SUBFOLDER') . '/login', array('controller' => 'WebController', 'method'=>'showLogin'), array()));
$routes->add('welcome', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'WebController', 'method'=>'showWelcome'), array()));
$routes->add('services', new Route(constant('URL_SUBFOLDER') . '/services', array('controller' => 'WebController', 'method'=>'showServices'), array()));
$routes->add('contact', new Route(constant('URL_SUBFOLDER') . '/contact', array('controller' => 'WebController', 'method'=>'showContact'), array()));


$routes->add('myServices', new Route(constant('URL_SUBFOLDER') . '/my-services', array('controller' => 'UserServiceController', 'method'=>'showMyServices'), array()));
$routes->add('createInquiry', new Route(constant('URL_SUBFOLDER') . '/send-inquiry', array('controller' => 'InquiryController', 'method'=>'createInquiry'), array(),$methods=array('POST')));
$routes->add('registerService', new Route(constant('URL_SUBFOLDER') . '/register-service/{id}', array('controller' => 'UserServiceController', 'method'=>'registerService'), array('id' => '[0-9]+'),$methods=array('POST')));
$routes->add('registerUser', new Route(constant('URL_SUBFOLDER') . '/register-user', array('controller' => 'AuthController', 'method'=>'registerUser'), array(),$methods=array('POST')));
$routes->add('loginUser', new Route(constant('URL_SUBFOLDER') . '/login-user', array('controller' => 'AuthController', 'method'=>'loginUser'), array(),$methods=array('POST')));
$routes->add('logoutUser', new Route(constant('URL_SUBFOLDER') . '/logout-user', array('controller' => 'AuthController', 'method'=>'logoutUser'), array()));