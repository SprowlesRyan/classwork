<?php
include "header.php";
$sql = "replace into zipcode (code,city,state) VALUES ('" . $_REQUEST["code"] . "','" . $_REQUEST["city"] . "','" . $_REQUEST["state"] . "')"; 
die($sql);
$mysqli->query($sql);

echo "<script>window.location='zipcodes.php'</script>";

include "footer.php";
?>