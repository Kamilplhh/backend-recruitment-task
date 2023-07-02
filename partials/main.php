<?php
require_once "UserController.php";

$Controller = new UserController();
$DataRows = $Controller->GetData();

if (!empty($DataRows)) {
    echo '<table id="table">
    <tr class="header">
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Company</th>
        <th></th>
    </tr>';

    foreach ($DataRows as $row) {
        echo "<tr>
        <th>" . $row->getName() . "</th>
        <th>" . $row->getUsername() . "</th>
        <th>" . $row->getEmail() . "</th>
        <th>" . $row->getAddress() . "</th>
        <th>" . $row->getPhone() . "</th>
        <th>" . $row->getCompany() . "</th>
        <th> <button class='remove' value=" . $row->getId() . ">Remove</button> </th>
        </tr>";
    }
    echo '</table>';
} else {
    echo '<center><h1> Users.json is empty </h1></center>';
}
?>
<form method="POST" action="UserController.php?action=addUser" autocomplete="off">
    <input type="hidden" name="id" id="id" />
    <input name="name" placeholder="Name" required></input>
    <input name="username" placeholder="Username" required></input>
    <input name="email" placeholder="Email" required></input>
    <input name="street" placeholder="Street" required></input>
    <input name="zipcode" placeholder="Zipcode" required></input>
    <input name="city" placeholder="City" required></input>
    <input name="phone" placeholder="Phone" required></input>
    <input name="companyName" placeholder="CompanyName" required></input>

    <button id="add" type="submit">Add</button>
</form>