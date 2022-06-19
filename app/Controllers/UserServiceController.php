<?php

namespace App\Controllers;

use App\Auth;
use App\Log;
use App\Models\Service;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;

use Exception;

class UserServiceController
{


	/* create inquiry */
	public function registerService(int $id, RouteCollection $routes, Request $request)
	{
		try {
			if (!Auth::getUser()) {
				header('Location: ' . APP_URL . '/login');
				exit;
			}
			$user = Auth::getUser();
			$data = ['user_id' => $user->getId(), 'service_id' => $id];
			$user->registerService($id);
			$flash_message = "Successfully Submitted!";
			header('Location: ' . APP_URL . '/my-services');
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
		}
	}

	/* show services view */
	public function showMyServices(RouteCollection $routes, Request $request)
	{
		try {
			if (!Auth::getUser()) {
				header('Location: ' . APP_URL . '/login');
				exit;
			}
			$menu = "my-services";
			$title = "My Services";
			$services = Auth::getUser()->services();
			require_once APP_ROOT . '/views/web/my_services.php';
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
		}
	}
}
