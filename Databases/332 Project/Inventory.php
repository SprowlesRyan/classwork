<?php
include "header.php";

echo "Current Inventory";

$sql = "select * from Inventory";

echo "<table border=1><tr><th>material</th><th>quantity</th><th>Carves_id</th><th>Carves_Monster_id</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["material"] . "</td>";
      echo "<td>" . $row["quantity"] . "</td>";
      echo "<td>" . $row["Carves_id"] . "</td>";
      echo "<td>" . $row["Carves_Monster_id"] . "</td>";
 //     echo "<td><a href='zipcodedelete.php?code=" . $row["code"] . "'>DEL</a></td>";
 //     echo "<td><<button>id=" . $row["id"] . "'>Killed</burron></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='Carves.php'>Back to Carves</a>";
include "footer.php";
?>