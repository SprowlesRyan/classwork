<?php
include "header.php";
if(empty($_REQUEST["id"])) {
$sql = "insert into `order` (`date`,customer_id) VALUES ('" . $_REQUEST["whenordered"] . "'," . $_REQUEST["customerid"] . ")"; 

}
else {
$sql = "update `order`";
$sql .= "set `date`='" . $_REQUEST["whenordered"] . "' ";
$sql .= "where id=" . $_REQUEST["id"];
}

$mysqli->query($sql);


echo "<script>window.location='customers.php'</script>";

include "footer.php";
?>