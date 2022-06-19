<?php
//error reporting
// ini_set('display_errors',1);
// error_reporting(E_ALL);

// Autoloader
require_once '../vendor/autoload.php';

// Load Config
require_once '../config/config.php';

//Start session
App\Log::debug('Starting the session...', ['file' => __FILE__, 'method' => __METHOD__]);
session_start();
//Set session user if already authenticated
if (isset($_SESSION['user'])) {
    App\Log::debug('Found session user', ['file' => __FILE__, 'method' => __METHOD__]);
    App\Auth::setUser(unserialize($_SESSION['user']));
}
App\Log::debug('Finding flash message', ['file' => __FILE__, 'method' => __METHOD__]);
//Set flash messages if already exist
if (isset($_SESSION['flash'])) {
    App\FlashMessage::setFlash(unserialize($_SESSION['flash']));
    App\Log::debug('Found message: '.App\FlashMessage::getFlash()->getMessage(), ['file' => __FILE__, 'method' => __METHOD__]);
}

// Routes
App\Log::debug('loading app routes...', ['file' => __FILE__, 'method' => __METHOD__]);
require_once '../routes/web.php';
require_once '../app/Router.php';
$router = new App\Router();
App\Log::debug('finding the correct route...', ['file' => __FILE__, 'method' => __METHOD__]);
$router($routes);
