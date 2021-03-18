<?php


namespace App\Models;


class Contact
{
    public $first_name;
    public $last_name;
    public $email;
    public $full_name;

    public function setFirstName($firstname)
    {
        $this->first_name = trim($firstname);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setLastName($lastname)
    {
        $this->last_name = trim($lastname);
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}