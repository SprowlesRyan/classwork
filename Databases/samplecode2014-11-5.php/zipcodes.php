<?php
echo "<a href='customers.php'>Manage Customers</a>";
include "header.php";

$sql = "select code,city,state from zipcode";

echo "<table border=1><tr><th>Code</th><th>City</th><th>State</th><th></th><th></th></tr>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["code"] . "</td>";
      echo "<td>" . $row["city"] . "</td>";
      echo "<td>" . $row["state"] . "</td>";
      echo "<td><a href='zipcodedelete.php?code=" . $row["code"] . "'>DEL</a></td>";
      echo "<td><a href='zipcodeupdateview.php?code=" . $row["code"] . "'>EDIT</a></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='zipcodeupdateview.php'>Add New</a>";
include "footer.php";
?>