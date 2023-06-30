<?php

require_once './App/Controllers/UserController.php';
$UsersC = new UsersContoller();
$DataRows = $UsersC->GetData();


echo '<table>
    <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Company</th>
        <th></th>
    </tr>';

foreach($DataRows as $row){
    echo "<tr>
        <th>" . $row->getName() . "</th>
        <th>" . $row->getUsername() . "</th>
        <th>" . $row->getEmail() . "</th>
        <th>" . $row->getAddress() . "</th>
        <th>" . $row->getPhone() . "</th>
        <th>" . $row->getCompany() . "</th>
        <th> <button value=". $row->getId() .">Remove</button> </th>
        </tr>";
}
echo '</table>';
?>
<button>Previous page</button>
<button>Next page</button>
<button>ADD</button>
