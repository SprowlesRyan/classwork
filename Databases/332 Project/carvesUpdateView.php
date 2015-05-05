<?php
include "header.php";
include 'monsterHeader.php';

$sql = "select name, rarity, Monster_id from Carves where name=" . $_REQUEST["name"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $name = $row["name"];
    $rarity = $row["rarity"];
    $Monster_id = $row["Monster_id"];
  }
}
include "footer.php"
?>
<form action="carvesUpdate.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
name: <input type="text" name="name" value="<?php echo $name?>"><br>
rarity: <input type="text" name="rarity" value="<?php echo $rarity?>"><br>
Monster_id: <input type="text" name="Monster_id" value="<?php echo $Monster_id?>"><br>
<input type="submit" value="Save">
</form>