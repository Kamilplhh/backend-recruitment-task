<?php
require_once "Models/User.php";

class UserController
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

        //Make User model object
        if (!empty($data)) {
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
        } else {
            $users_array = null;
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

    function AddUser()
    {
        $json_data = file_get_contents($this->usersTable);
        $data = json_decode($json_data, true);

        //Make array from POST form data
        $NewUser = [[
            "id" => intval($_POST['id']),
            "name" => $_POST['name'],
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "address" => ['street' => $_POST['street'], 'zipcode' => $_POST['zipcode'], 'city' => $_POST['city']],
            "phone" => $_POST['phone'],
            "company" => ['name' => $_POST['companyName']]

        ]];

        //Merge new array with json file and save it
        $result = array_merge($data, $NewUser);
        $newJsonFile = json_encode(array_values($result), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($this->usersTable, $newJsonFile);

        header('Location: ./index.php');
    }
}


//Get request from script.js/index.php file and call a function
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['index'])) {
        $Controller = new UserController();
        $Controller->RemoveUser();
    } elseif (!empty($_GET['action'])) {
        if (!empty($_POST)) {
            $Controller = new UserController();
            $Controller->AddUser();
        }
    } else {
        echo 'Error with request';
    }
}
