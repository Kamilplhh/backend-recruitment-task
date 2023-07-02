<?php
require_once "Models/User.php";

class UserContoller
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

        foreach ($data as $row) {
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

    function RemoveUser()
    {
        $UserId = $_POST['index'];
        $json_data = file_get_contents($this->usersTable);
        $data = json_decode($json_data, true);

        //Find user in array by ID and remove it from it
        $UserIndex = array_search($UserId, array_column($data, 'id'));
        unset($data[$UserIndex]);

        //Overwrite json with new array
        $newJsonFile = json_encode(array_values($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($this->usersTable, $newJsonFile);
    }
}


//Get request from js file and call a function
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['index'])) {
        $Controller = new UserContoller();
        $Controller->RemoveUser();
    } else {
        echo "Error";
    }
}
