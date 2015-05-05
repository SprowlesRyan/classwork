<?php
include "header.php";
$sql = "update Carves ";
$sql .= "set name='" . $_REQUEST["name"] . "',";
$sql .= "rarity='" . $_REQUEST["rarity"] . " ',";
$sql .= "Monster_id='" .$_REQUEST["Monster_id"]."'";

$mysqli->query($sql);
//die(var_dump($sql));
echo "<script>window.location='monsters.php'</script>";

include "footer.php";
?>