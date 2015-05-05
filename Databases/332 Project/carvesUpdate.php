<?php
include "header.php";
$sql = "update Carves ";
$sql .= "set rarity='" . $_REQUEST["rarity"] . " ',";
$sql .= "Monster_id='" .$_REQUEST["Monster_id"]."'";
$sql .= "where name='" . $_REQUEST["name"] . "',";

$mysqli->query($sql);
die(var_dump($sql));
echo "<script>window.location='Carves.php'</script>";

include "footer.php";
?>