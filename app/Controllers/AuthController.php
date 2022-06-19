<?php

namespace App\Controllers;

use App\Auth;
use App\Log;
use App\Models\Flash;
use App\Models\User;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

class AuthController
{

	/* register a user */
	public function registerUser(RouteCollection $routes, Request $request)
	{
		try {
			$data = [
				'name' => $request->request->get('name'), 
				'email' => $request->request->get('email'), 
				'password' => $request->request->get('password'), 
				'confirm_password' => $request->request->get('confirm_password'), 
				'is_admin' => 0
			];
			$user = User::create($data);
			$flash_message = "Successfully Submitted!";
			header('Location: ' . APP_URL . '/');
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			require_once APP_ROOT . '/views/errors/500.php';
		}
	}

	/* login a user */
	public function loginUser(RouteCollection $routes, Request $request)
	{
		try {
			$data = [
				'email' => $request->request->get('email'), 
				'password' => $request->request->get('password'), 
			];
			$user = User::login($data);
			Log::debug("User: " . json_encode($user), ['file' => __FILE__, 'method' => __METHOD__]);
			if($user !=null){
				$_SESSION['user'] = serialize($user);
				$_SESSION['flash'] = serialize(new Flash("success","login successful"));
				Auth::setUser($user);
				header('Location: ' . APP_URL . '/');

			}else{
				$_SESSION['flash'] = serialize(new Flash("danger","Invalid credentials"));
				header('Location: ' . APP_URL . '/login');
			}
			
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			require_once APP_ROOT . '/views/errors/500.php';
		}
	}

	/* register a user */
	public function logoutUser(RouteCollection $routes, Request $request)
	{
		try {
			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				Auth::setUser(null);
				header('Location: ' . APP_URL . '/');
			}
			
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			require_once APP_ROOT . '/views/errors/500.php';
		}
	}

}
