<?php
include "header.php";
include 'custheader.php';

$sql = "select areacode, number from phone where id=" . $_REQUEST["id"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $areacode = $row["areacode"];
    $number = $row["number"];
  }
}
?>
<form action="phoneupdate.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
<input type="hidden" name="customerid" value="<?php echo $_REQUEST["customerid"]?>">
Area code: <input type="text" name="areacode" value="<?php echo $areacode?>"><br>
Number: <input type="text" name="number" value="<?php echo $number?>"><br>
<input type="submit" value="Save">
</form>

<?php
include "footer.php";
?>