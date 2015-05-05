<?php
include "header.php";
$sql = "select city, state from zipcode where code='" . $_REQUEST["code"] . "'";


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $city = $row["city"];
    $state = $row["state"];
  }
}

?>

<form action="zipcodeupdate.php">
<?php
if(empty($_REQUEST["code"])) {
?>
Zip Code: <input type="text" name="code" value="<?php echo $_REQUEST["code"]?>"></br>
<?php
} else {
echo 'Zip Code: ' . $_REQUEST["code"] . '<br>';
?>
<input type="hidden" name="code" value="<?php echo $_REQUEST["code"]?>">
<?php
} ?>
City: <input type="text" name="city" value="<?php echo $city?>"><br>
State: <input type="text"  name="state" value="<?php echo $state?>">
<input type="submit" value="Save">
</form>
<?php

include "footer.php";
?>