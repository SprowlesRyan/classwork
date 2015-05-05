<?php
include "header.php";

$sql = "select * from Weapon";

echo "<table border=1><tr><th>name</th><th>class</th><th>damage</th><th>sharpness</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["class"] . "</td>";
      echo "<td>" . $row["damage"] . "</td>";
      echo "<td>" . $row["sharpness"] . "</td>";
 //     echo "<td><a href='zipcodedelete.php?code=" . $row["code"] . "'>DEL</a></td>";
//      echo "<td><<button>id=" . $row["id"] . "'>Killed</burron></td>";
      echo "</tr>";
  }
}
echo "</table>";
//echo "<a href='questsInsert.html'>Add New</a>";
include "footer.php";
?>