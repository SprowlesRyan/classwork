<?php
include "header.php";

echo "CHOOSE YOUR WEAPON";

$sql = "select * from Weapon";

echo "<table border=1><tr><th>name</th><th>class</th><th>damage</th><th>sharpness</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["class"] . "</td>";
      echo "<td>" . $row["damage"] . "</td>";
      echo "<td>" . $row["sharpness"] . "</td>";
      echo "<td><a href='recipe.php?code=" . $row["name"] . "'>Recipe</a></td>";
//      echo "<td><<button>id=" . $row["id"] . "'>Killed</burron></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='Carves.php'>Back to Carves</a><br>";
//echo "<a href='questsInsert.html'>Add New</a>";
include "footer.php";
?>