<?php

namespace App\Models;

use App\Database;
use App\Log;
use Exception;

class Service
{
	protected $id;
	protected $name;
	protected $image;

	// GET METHODS
	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getImage()
	{
		return $this->image;
	}
	

	// SET METHODS
	public function setName(string $name)
	{
		return $this->name = $name;
	}
	public function setImage(string $image)
	{
		return $this->image = $image;
	}


	// CRUD OPERATIONS
	public static function create(array $data)
	{
		$service = new Service();
		$service->name = $data['name'];
		$service->image=$data['image'];

		$sql = "INSERT INTO services (name,image) VALUES (?,?)";
		$stmt = Database::prepared_query($sql, [$service->name,$service->image]);
		$service->id = Database::getConnection()->insert_id;
		return $service;
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
			$sql = "SELECT * FROM services";
			$services = Database::prepared_select($sql)->fetch_all(MYSQLI_ASSOC);
			$services=array_map("self::assocToObject",$services);
			return $services;
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			return [];
		}
	}

	public static function assocToObject($data){
		$service=new Service();
		$service->id=$data["id"];
		$service->name = $data['name'];
		$service->image=$data['image'];
		return $service;
	}
}
