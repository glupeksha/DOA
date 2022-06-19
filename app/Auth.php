<?php
namespace App;

use App\Models\User;

class Auth {

	protected static $user=null;

	
	/**
	 * Method to return the authenticated user
	 *
	 * @return \App\Models\User
	 */
	static public function getUser()
	{
		return self::$user;
	}

    /**
	 * Method to set authenticated user
	 *
	 */
	static public function setUser($user)
	{
		self::$user=$user;
	}


}