<?php
include "header.php";
$sql = "delete from `order` where id=" . $_REQUEST["id"];

$mysqli->query($sql);

echo "<script>window.location='customers.php'</script>";

include "footer.php";
?>