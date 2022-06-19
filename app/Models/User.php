<?php

namespace App\Models;

use App\Database;
use App\Log;
use Exception;
use App\Models\Service;

class User
{
	protected $id;
	protected $name;
	protected $email;
	protected $isAdmin;

	// GET METHODS
	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getIsAdmin()
	{
		return $this->isAdmin;
	}

	// SET METHODS
	public function setName(string $name)
	{
		return $this->name = $name;
	}

	public function setEmail(string $email)
	{
		return $this->email = $email;
	}
	public function setIsAdmin(bool $isAdmin)
	{
		return $this->isAdmin = $isAdmin;
	}

	// CRUD OPERATIONS
	public static function create(array $data)
	{
		$user = new User();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->subject = $data['subject'];
		$user->message = $data['message'];
		$user->isAdmin = $data['is_admin'];
		$sql = "INSERT INTO users (name,email,password,is_admin) VALUES (?,?,?,?)";
		$stmt = Database::prepared_query($sql, [$user->name, $user->email, password_hash($user->password, PASSWORD_DEFAULT), $user->isAdmin]);
		$user->id = Database::getConnection()->insert_id;
		return $user;
	}

	public static function read(int $id)
	{
	}

	public function update(int $id, array $data)
	{
	}

	public function delete(int $id)
	{
	}
	public static function all()
	{
		try {
			$sql = "SELECT * FROM users";
			$users = Database::prepared_select($sql)->fetch_all(MYSQLI_ASSOC);
			$users = array_map("self::assocToObject", $users);
			return $users;
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			return [];
		}
	}

	protected static function assocToObject($data)
	{
		$user = new User();
		$user->id = $data["id"];
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = $data['password'];
		$user->isAdmin = $data['is_admin'];
		return $user;
	}

	public static function login($data)
	{
		try {
			$sql = "SELECT * FROM users WHERE email = ?";
			$userData = Database::prepared_select($sql, [$data["email"]])->fetch_assoc();
			Log::debug("User data: ".json_encode($userData),['file'=>__FILE__,'method' => __METHOD__]);
			Log::debug("entered password: ".password_hash($data['password'],PASSWORD_DEFAULT)." User data: ".$userData['password']."is verified: ".json_encode(password_verify($data['password'], $userData['password'])),['file'=>__FILE__,'method' => __METHOD__]);
			if ($userData && password_verify($data['password'], $userData['password'])) {
				$user = new User();
				$user->id = $userData["id"];
				$user->name = $userData['name'];
				$user->email = $userData['email'];
				$user->isAdmin = $userData['is_admin'];
				return $user;
			}
			return null;
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			return null;
		}
	}

	public function services()
	{
		try {
			$sql = "SELECT services.id, services.name, services.image FROM user_services INNER JOIN services ON user_services.service_id=services.id WHERE user_services.user_id =?";
			$services = Database::prepared_select($sql,[$this->id])->fetch_all(MYSQLI_ASSOC);
			$services = array_map("self::assocToService", $services);
			return $services;
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			return [];
		}
	}
	protected function assocToService($data){
		return Service::assocToObject($data);
	}

	public function registerService(int $id)
	{
		try {
			if(!$this->isRegistered($id)){
				$sql = "INSERT INTO user_services (user_id,service_id) VALUES (?,?)";
				$stmt = Database::prepared_query($sql,[$this->id,$id]);
			}
			return true;
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			return false;
		}
	}

	public function isRegistered(int $id)
	{
		try {
			$sql = "SELECT * FROM user_services WHERE user_id=? AND service_id=?";
			$userServices = Database::prepared_select($sql,[$this->id,$id])->fetch_all(MYSQLI_ASSOC);
			$userServices = array_map("self::assocToObject", $userServices);
			return count($userServices)>0;
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			return false;
		}
	}
}
