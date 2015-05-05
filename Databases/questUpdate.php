<?php
include "header.php";
$sql = "update Quests ";
$sql .= "set id='" . $_REQUEST["id"] . "',";
$sql .= "name='" . $_REQUEST["name"] . "',";
$sql .= "reward='" . $_REQUEST["reward"] . "' ";
$sql .= "Monster_id=" . $_REQUEST["Monster_id"];
$sql .= "Area_id=" . $_REQUEST["Area_id"];

$mysqli->query($sql);

echo "<script>window.location='quests.php'</script>";

include "footer.php";
?>