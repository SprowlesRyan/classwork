<?php
include "header.php";
$sql = "delete from zipcode where code='" . $_REQUEST["code"] . "'";

$mysqli->query($sql);

echo "<script>window.location='zipcodes.php'</script>";

include "footer.php";
?>