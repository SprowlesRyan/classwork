<?php
include "header.php";

$sql = "select * from Inventory";

echo "<table border=1><tr><th>id</th><th>material 1</th><th>material 2</th><th>material 3</th><th>Weapon_name</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["material 1"] . "</td>";
      echo "<td>" . $row["material 2"] . "</td>";
      echo "<td>" . $row["material 3"] . "</td>";
      echo "<td>" . $row["Weapon_name"] . "</td>";

 //     echo "<td><a href='zipcodedelete.php?code=" . $row["code"] . "'>DEL</a></td>";
//      echo "<td><<button>id=" . $row["id"] . "'>Killed</burron></td>";
      echo "</tr>";
  }
}
echo "</table>";
//echo "<a href='questsInsert.html'>Add New</a>";
include "footer.php";
?>