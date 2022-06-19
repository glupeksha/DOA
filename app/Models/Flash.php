<?php

namespace App\Models;


class Flash
{
    protected $type;
    protected $message;

    function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    // GET METHODS
    public function getType()
    {
        return $this->type;
    }
    public function getMessage()
    {
        return $this->message;
    }

    // SET METHODS
    public function setType(string $type)
    {
        return $this->type = $type;
    }

    public function setMessage(string $message)
    {
        return $this->message = $message;
    }
}
