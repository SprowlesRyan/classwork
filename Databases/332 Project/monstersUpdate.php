<?php
include "header.php";
$sql = "update Monster ";
$sql .= "set alive=" . $_REQUEST["alive"] . " ";
$sql .= "where id='" .$_REQUEST["id"]."'";

$mysqli->query($sql);
//die(var_dump($sql));
echo "<script>window.location='monsters.php'</script>";

include "footer.php";
?>