<?php
include "header.php";

$sql = "select * from Carves";

echo "<table border=1><tr><th>name</th><th>rarity</th><th>Monster_id</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["rarity"] . "</td>";
      echo "<td>" . $row["Monster_id"] . "</td>";
 //     echo "<td><a href='zipcodedelete.php?code=" . $row["code"] . "'>DEL</a></td>";
      echo "<td><<button>id=" . $row["id"] . "'>Killed</burron></td>";
      echo "</tr>";
  }
}
echo "</table>";
//echo "<a href='questsInsert.html'>Add New</a>";
include "footer.php";
?>