<?php
class User
{
    private $usersTable;

    public function __construct()
    {
        $this->usersTable = './dataset/users.json';
    }

    public function GetAllUsers()
    {
        $json_data = file_get_contents($this->usersTable);
        $data = json_decode($json_data, true);

        return $data;
    }
}
