<?php
include "header.php";
$sql = "delete from address where id=" . $_REQUEST["id"];

$mysqli->query($sql);

echo "<script>window.location='customers.php'</script>";

include "footer.php";
?>