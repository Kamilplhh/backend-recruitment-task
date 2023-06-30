<?php
require './App/Models/User.php';

class UsersContoller
{
    private $usersTable;

    public function __construct()
    {
        $this->usersTable = './dataset/users.json';
    }

    function GetData()
    {
        $json_data = file_get_contents($this->usersTable);
        $data = json_decode($json_data, true);
        $users_array = [];

        foreach($data as $row){
            $users = new User(
                $row['id'],
                $row['name'],
                $row['username'],
                $row['email'],
                $row['address'],
                $row['phone'],
                $row['company']
            );
            $users_array[] = $users;
        }
        return $users_array;
    }
}
