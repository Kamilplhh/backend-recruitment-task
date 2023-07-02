<?php
class User
{
    protected $id;
    protected $name;
    protected $username;
    protected $email;
    protected $address;
    protected $phone;
    protected $company;

    public function __construct($id, $name, $username, $email, $address, $phone, $company)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->company = $company;
    }

    //Get Methods
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address['street'] . ', ' .  $this->address['zipcode'] . ' ' . $this->address['city'];
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getCompany()
    {
        return $this->company['name'];
    }

}
