<?php

$sql = "select id, name, reward, finished, Monster_id, Area_id from Quests where id=" . $_REQUEST["customerid"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $reward = $row["reward"];
    $finished = $row["finished"];
    $Monster_id = $row["Monster_id"];
    $Area_id = $row["Area_id"];
  }
}
?>
<table>
<tr><td>id: </td><td><?php echo $id?></td></tr>
<tr><td>name: </td><td><?php echo $name?></td></tr>
<tr><td>reward: </td><td><?php echo $reward?></td></tr>
<tr><td>finished: </td><td><?php echo $finished?></td></tr>
<tr><td>Monster_id: </td><td><?php echo $Monster_id?></td></tr>
<tr><td>Area_id: </td><td><?php echo $Area_id?></td></tr>
</table>
</br>
</br>