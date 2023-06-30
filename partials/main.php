<?php

require_once './App/Controllers/UserController.php';

$UsersC = new UsersContoller();

echo $UsersC->GetData();



