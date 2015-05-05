<?php
echo "<a href='zipcodes.php'>Manage Zip Codes</a>";
include "header.php";

$sql = "select id,firstname, lastname, email,cust_phones(id) phones,cust_addrs(id) addresses,cust_orders(id) orders from customer";
echo "<table border=1><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phones</th><th>Addresses</th><th>Orders</th><th></th><th></th></tr>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["firstname"] . "</td>";
      echo "<td>" . $row["lastname"] . "</td>";
      echo "<td>" . $row["email"] . "</td>";
      echo "<td>" . $row["phones"] . "</td>";
      echo "<td>" . $row["addresses"] . "</td>";
      echo "<td>" . $row["orders"] . "</td>";
      echo "<td><a href='custdelete.php?id=" . $row["id"] . "'>DEL</a></td>";
      echo "<td><a href='custupdateview.php?id=" . $row["id"] . "'>EDIT</a></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='custinsert.html'>Add New</a>";
include "footer.php";
?>