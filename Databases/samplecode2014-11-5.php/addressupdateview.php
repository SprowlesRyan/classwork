<?php
include "header.php";
include "custheader.php";
$sql = "select street, zipcode from address where id=" . $_REQUEST["id"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $street = $row["street"];
    $zipcode = $row["zipcode"];
  }
}
?>
<form action="addressupdate.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
<input type="hidden" name="customerid" value="<?php echo $_REQUEST["customerid"]?>">
Street: <input type="text" name="street" value="<?php echo $street?>"><br>
Zipcode: <select name="zipcode" value="<?php echo $zipcode?>">
<?php
$sql = "select code, city,state from zipcode";


if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['code'] . '">' . $row['code'] . " " . $row['city'] . " " . $row['state'] . '</option >';
  }
}

?>
</select><br>
<input type="submit" value="Save">
</form>
<?php

include "footer.php";
?>