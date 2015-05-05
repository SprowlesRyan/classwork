<?php
include "header.php";
if(empty($_REQUEST["id"])) {
$sql = "insert into phone (areacode,number,customer_id) VALUES ('" . $_REQUEST["areacode"] . "','" . $_REQUEST["number"] . "'," . $_REQUEST["customerid"] . ")"; 

}
else {
$sql = "update phone ";
$sql .= "set areacode='" . $_REQUEST["areacode"] . "',";
$sql .= "number='" . $_REQUEST["number"] . "' ";
$sql .= "where id=" . $_REQUEST["id"];
}
$mysqli->query($sql);

echo "<script>window.location='customers.php'</script>";

include "footer.php";
?>