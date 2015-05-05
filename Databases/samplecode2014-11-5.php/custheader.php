<?php

$sql = "select firstname, lastname, email from customer where id=" . $_REQUEST["customerid"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
  }
}
?>
<table>
<tr><td>First name: </td><td><?php echo $firstname?></td></tr>
<tr><td>Last name: </td><td><?php echo $lastname?></td></tr>
<tr><td>Email: </td><td><?php echo $email?></td></tr>
</table>
</br>
</br>