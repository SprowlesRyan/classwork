<?php
include "header.php";
include 'monsterHeader.php';

$sql = "select id, name, reward, finished, Monster_id, Area_id from Quests=" . $_REQUEST["id"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $alive = $row["alive"];
    $breakable_part = $row["breakable_part"];
  }
}
include "footer.php"
?>
<form action="monsterUpdate.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
alive: <input type="text" name="alive" value="<?php echo $alive?>"><br>
<input type="submit" value="Save">
</form>