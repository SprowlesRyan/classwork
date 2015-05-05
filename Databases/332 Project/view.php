<?php
include "header.php";

echo "This Points in the direction of a certain Monster";

$sql = "select * from check_monster_locations";

echo "<table border=1><tr><th>Area_id</th><th>Monster_id</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["Area_id"] . "</td>";
      echo "<td>" . $row["Monster_id"] . "</td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='quests.php'>Back to Quests</a><br>"; 
echo "<a href='monsters.php'>Monsters Here</a>";
include "footer.php";
?>