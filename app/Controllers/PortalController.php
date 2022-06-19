<?php
namespace App\Controllers;

use App\Models\Inquiry;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

class PortalController {


	/* show admin login view */
	public function showDashboard(RouteCollection $routes, Request $request){
		$title="Dashboard";
		require_once APP_ROOT . '/views/portal/dashboard.php';
	}

	/* show admin login view */
	public function showInquiries(RouteCollection $routes, Request $request){
		$title="Inquiries";
		$inquiries = Inquiry::all();
		require_once APP_ROOT . '/views/portal/inquiries.php';
	}

	/* show admin login view */
	public function showUsers(RouteCollection $routes, Request $request){
		$title="Users";
		$users = User::all();
		require_once APP_ROOT . '/views/portal/users.php';
	}
}