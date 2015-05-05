<?php
include "header.php";
$sql = "update customer ";
$sql .= "set firstname='" . $_REQUEST["firstname"] . "',";
$sql .= "lastname='" . $_REQUEST["lastname"] . "',";
$sql .= "email='" . $_REQUEST["email"] . "' ";
$sql .= "where id=" . $_REQUEST["id"];

$mysqli->query($sql);

echo "<script>window.location='customers.php'</script>";

include "footer.php";
?>