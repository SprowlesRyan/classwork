<?php
include "header.php";
$sql = "insert into Monster (id, alive,breakable_part) VALUES (";
$sql .= "'" . $_REQUEST["id"] . "',";
$sql .=       $_REQUEST["alive"] . ",";
$sql .= "'" . $_REQUEST["breakable_part"] . "')";

$mysqli->query($sql);
//die(var_dump($sql));

echo "<script>window.location='monsters.php'</script>";

include "footer.php";
?>