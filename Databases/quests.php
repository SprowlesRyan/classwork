<?php
include "header.php";

$sql = "select * from Quests";

echo "<table border=1><tr><th>id</th><th>name</th><th>reward</th><th>finshed</th><th>monster_id</th><th>area_id</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["reward"] . "</td>";
      echo "<td>" . $row["finished"] . "</td>";
      echo "<td>" . $row["Monster_id"] . "</td>";
      echo "<td>" . $row["Area_id"] . "</td>";
 //     echo "<td><a href='zipcodedelete.php?code=" . $row["code"] . "'>DEL</a></td>";
      echo "<td><a href='questUpdateView.php?code=" . $row["code"] . "'>EDIT</a></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='questsInsert.html'>Add New</a>";
echo "<a href='monsters.php'>Monsters Here</a>";
include "footer.php";
?>