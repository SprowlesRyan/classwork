<?php
include "header.php";
if(empty($_REQUEST["id"])) {
$sql = "insert into address (street,zipcode,customer_id) VALUES ('" . $_REQUEST["street"] . "','" . $_REQUEST["zipcode"] . "'," . $_REQUEST["customerid"] . ")"; 

}
else {
$sql = "update address ";
$sql .= "set street='" . $_REQUEST["street"] . "',";
$sql .= "zipcode='" . $_REQUEST["zipcode"] . "' ";
$sql .= "where id=" . $_REQUEST["id"];
}

$mysqli->query($sql);

echo "<script>window.location='customers.php'</script>";

include "footer.php";
?>