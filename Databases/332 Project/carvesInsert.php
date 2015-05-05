<?php
include "header.php";
$sql = "insert into Carves (name, rarity,Monster_id) VALUES (";
$sql .= "'" . $_REQUEST["name"] . "',";
$sql .= "'" . $_REQUEST["rarity"] . "',";
$sql .= "'" . $_REQUEST["Monster_id"] . "')";

$mysqli->query($sql);
//die(var_dump($sql));

echo "<script>window.location='Carves.php'</script>";

include "footer.php";
?>