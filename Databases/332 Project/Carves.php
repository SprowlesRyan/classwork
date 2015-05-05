<?php
include "header.php";

echo "CURRENTLY KNOWN CARVES";

$sql = "select * from Carves";

echo "<table border=1><tr><th>name</th><th>rarity</th><th>Monster_id</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["rarity"] . "</td>";
      echo "<td>" . $row["Monster_id"] . "</td>";
      echo "<td><a href='carvesUpdateView.php?code=" . $row["name"] . "'>EDIT</a></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='monsters.php'>Back to Monsters</a><br>";
echo "<a href='carvesInsert.html'>Add New</a><br>";
echo "<a href='weapon.php'>What are these for?</a><br>";
echo "<a href='Inventory.php'>Current Inventory</a><br>";
include "footer.php";
?>