<?php
include "header.php";

echo "THESE ARE THE MONSTER GOOD LUCK ";

$sql = "select * from Monster";

echo "<table border=1><tr><th>id</th><th>alive</th><th>breakable_part</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["alive"] . "</td>";
      echo "<td>" . $row["breakable_part"] . "</td>";
      echo "<td><a href='monstersUpdateView.php?id=" . $row["id"] . "'>EDIT</a></td>";
  }
}
echo "</table>";
echo "<a href='monsterInsert.html'>Add New</a> <br>";
echo "<a href='Carves.php'>What Can I get from these?</a> <br>";
echo "<a href='quests.php'>Back To Quests</a>";
include "footer.php";
?>