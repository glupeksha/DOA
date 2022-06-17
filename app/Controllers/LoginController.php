<?php
namespace App\Controllers;
use Symfony\Component\Routing\RouteCollection;

class LoginController {


	/* show admin login view */
	public function showAdminLogin(RouteCollection $routes){
		require_once APP_ROOT . '/views/admin/html/login.php';
	}
}