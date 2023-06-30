<?php
require './App/Models/User.php';

class UsersContoller
{
    function GetData()
    {
        $User = new User();
        $UsersTable = $User->GetAllUsers();
      
        foreach($UsersTable as $row){
            echo $row['name'];
        }

    }
}
