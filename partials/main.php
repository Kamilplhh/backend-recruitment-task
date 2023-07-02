<?php
require_once "UserController.php";

$UsersC = new UserContoller();
$DataRows = $UsersC->GetData();

echo '<table>
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
?>
<button>Add</button>