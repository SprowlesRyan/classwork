<?php
include "header.php";
$sql = "insert into customer (firstname, lastname, email) VALUES (";
$sql .= "'" . $_REQUEST["firstname"] . "',";
$sql .= "'" . $_REQUEST["lastname"] . "',";
$sql .= "'" . $_REQUEST["email"] . "');";

$mysqli->query($sql);

echo "<script>window.location='customers.php'</script>";

include "footer.php";
?>