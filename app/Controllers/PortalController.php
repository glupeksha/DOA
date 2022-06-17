<?php
namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class PortalController {


	/* show admin login view */
	public function showDashboard(RouteCollection $routes){
		require_once APP_ROOT . '/views/admin/html/dashboard.php';
	}
}