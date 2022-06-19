<?php
namespace App;

use App\Models\Flash;

class FlashMessage {

	protected static $flash=null;

	
	/**
	 * Method to return the authenticated flash
	 *
	 * @return \App\Models\Flash
	 */
	static public function getFlash()
	{
		return self::$flash;
	}

    /**
	 * Method to set authenticated flash
	 *
	 */
	static public function setFlash($flash)
	{
		self::$flash=$flash;
	}


}