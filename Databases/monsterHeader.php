<?php

$sql = "select id, alive, breakable_part from Monster where id=" . $_REQUEST["customerid"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $alive = $row["alive"];
    $breakable_part = $row["breakable_part"];
  }
}
?>
<table>
<tr><td>id: </td><td><?php echo $id?></td></tr>
<tr><td>alive: </td><td><?php echo $alive?></td></tr>
<tr><td>breakable_part: </td><td><?php echo $breakable_part?></td></tr>
</table>
</br>
</br>