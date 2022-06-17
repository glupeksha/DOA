<?php 
namespace App\Models;

class User extends Model
{
	protected $id;
	protected $name;
	protected $email;
	protected $isAdmin;

	// GET METHODS
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getIsAdmin(){
		return $this->isAdmin;
	}

	// SET METHODS
	public function setName(string $name){
		return $this->name=$name;
	}

	public function setEmail(string $email){
		return $this->email=$email;
	}
	public function setIsAdmin(bool $isAdmin){
		return $this->isAdmin=$isAdmin;
	}

	// CRUD OPERATIONS
    public function create(array $data)
    {

    }

    public function read(int $id)
    {

    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }
		
}