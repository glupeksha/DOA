<?php

namespace App\Controllers;

use App\Log;
use App\Models\Inquiry;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;

use Exception;

class InquiryController
{


	/* create inquiry */
	public function createInquiry(RouteCollection $routes, Request $request)
	{
		try {
			$data = ['name' => $request->request->get('name'), 'email' => $request->request->get('email'), 'subject' => $request->request->get('subject'), 'message' => $request->request->get('message')];
			$inquiry = Inquiry::create($data);
			$flash_message="Successfully Submitted!";
			header('Location: '.APP_URL.'/contact');
		} catch (Exception $e) {
			Log::error("Error: ".$e,['file'=>__FILE__,'method' => __METHOD__]);
		}
		
	}
}
