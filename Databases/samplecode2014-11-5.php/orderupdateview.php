<?php
include "header.php";
include "custheader.php";
$sql = "select id,DATE_FORMAT(`date`,'%Y-%m-%d') whenordered from `order` where id=" . $_REQUEST["id"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $whenordered = $row["whenordered"];
  }
}
?>
<form action="orderupdate.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
<input type="hidden" name="customerid" value="<?php echo $_REQUEST["customerid"]?>">
Date: <input type="date" name="whenordered" value="<?php echo $whenordered?>">
<input type="submit" value="Save">
</form>
<?php

include "footer.php";
?>