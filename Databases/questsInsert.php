<?php
include "header.php";
$sql = "insert into Quests (id, name, reward, finshed, Monster_id, Area_id) VALUES (";
$sql .=       $_REQUEST["id"] . ",";
$sql .= "'" . $_REQUEST["name"] . "',";
$sql .= "'" . $_REQUEST["reward"] . "';";
$sql .=       $_REQUEST["finished"] . ";";
$sql .= "'" . $_REQUEST["Monster_id"] . "';";
$sql .= "'" . $_REQUEST["Area_id"] . "');";

$mysqli->query($sql);

echo "<script>window.location='quests.php'</script>";

include "footer.php";
?>