<?php
namespace App\Controllers;

use App\Models\Service;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;

class WebController {


	/* show welcome view */
	public function showWelcome(RouteCollection $routes, Request $request){
		$menu="home";
		$title="Department of Agriculture";
		require_once APP_ROOT . '/views/web/welcome.php';
	}

    /* show services view */
	public function showServices(RouteCollection $routes, Request $request){
		$menu="services";
		$title="Services";
		$services=Service::all();
		require_once APP_ROOT . '/views/web/services.php';
	}



	/* show contact view */
	public function showContact(RouteCollection $routes, Request $request){
		$menu="contact";
		$title="Contact Us";
		require_once APP_ROOT . '/views/web/contact.php';
	}

	/* show register view */
	public function showRegister(RouteCollection $routes, Request $request){
		$menu="register";
		$title="Sign Up";
		require_once APP_ROOT . '/views/web/register.php';
	}

	/* show login view */
	public function showLogin(RouteCollection $routes, Request $request){
		$menu="login";
		$title="Login";
		require_once APP_ROOT . '/views/web/login.php';
	}
}