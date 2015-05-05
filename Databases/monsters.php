<?php
include "header.php";

$sql = "select * from Monster";

echo "<table border=1><tr><th>id</th><th>alive</th><th>breakable_part</th>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["alive"] . "</td>";
      echo "<td>" . $row["breakable_part"] . "</td>";
 //     echo "<td><a href='zipcodedelete.php?code=" . $row["code"] . "'>DEL</a></td>";
      echo "<td><<button>id=" . $row["id"] . "'>Killed</burron></td>";
      echo "</tr>";
  }
}
echo "</table>";
//echo "<a href='questsInsert.html'>Add New</a>";
include "footer.php";
?>