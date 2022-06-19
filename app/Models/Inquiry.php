<?php

namespace App\Models;

use App\Database;
use App\Log;
use Exception;

class Inquiry
{
	protected $id;
	protected $name;
	protected $email;
	protected $subject;
	protected $message;

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
	public function getSubject()
	{
		return $this->subject;
	}
	public function getMessage()
	{
		return $this->message;
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
	public function setSubject(string $subject)
	{
		return $this->subject = $subject;
	}
	public function setMessage(string $message)
	{
		return $this->message = $message;
	}

	// CRUD OPERATIONS
	public static function create(array $data)
	{
		$inquiry = new Inquiry();
		$inquiry->name = $data['name'];
		$inquiry->email = $data['email'];
		$inquiry->subject = $data['subject'];
		$inquiry->message = $data['message'];
		$sql = "INSERT INTO inquiries (name,email,subject,message) VALUES (?,?,?,?)";
		$stmt = Database::prepared_query($sql, [$inquiry->name, $inquiry->email, $inquiry->subject, $inquiry->message]);
		$inquiry->id = Database::getConnection()->insert_id;
		return $inquiry;
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
			$sql = "SELECT * FROM inquiries";
			$inquiries = Database::prepared_select($sql)->fetch_all(MYSQLI_ASSOC);
			$inquiries=array_map("self::assocToObject",$inquiries);
			return $inquiries;
		} catch (Exception $e) {
			Log::error("Error: " . $e, ['file' => __FILE__, 'method' => __METHOD__]);
			return [];
		}
	}

	protected static function assocToObject($data){
		$inquiry=new Inquiry();
		$inquiry->id=$data["id"];
		$inquiry->name = $data['name'];
		$inquiry->email = $data['email'];
		$inquiry->subject = $data['subject'];
		$inquiry->message = $data['message'];
		return $inquiry;
	}
}
