<?php
include "header.php";
$sql = "update Quests ";
$sql .= "set name='" . $_REQUEST["name"] . "',";
$sql .= "reward='" . $_REQUEST["reward"] . "',";
$sql .= "finished=" . $_REQUEST["finished"] . ",";
$sql .= "Monster_id='" . $_REQUEST["Monster_id"]. "',";
$sql .= "Area_id='" . $_REQUEST["Area_id"]. "'";
$sql .= "where id='" .$_REQUEST["id"]."'";

$mysqli->query($sql);
//die(var_dump($sql));
echo "<script>window.location='quests.php'</script>";

include "footer.php";
?>