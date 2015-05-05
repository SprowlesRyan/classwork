<?php
include "header.php";
include 'custheader.php';

$sql = "select firstname, lastname, email from customer where id=" . $_REQUEST["id"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
  }
}
?>
<form action="custupdate.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
First name: <input type="text" name="firstname" value="<?php echo $firstname?>"><br>
Last name: <input type="text" name="lastname" value="<?php echo $lastname?>"><br>
Email: <input type="email" name="email" value="<?php echo $email?>"><br>
<input type="submit" value="Save">
</form>

<?php
$sql = "select id,areacode, number from phone where customer_id= " . $_REQUEST["id"];
echo "<table border=1><tr><th>Area Code</th><th>Number</th><th></th><th></th></tr>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["areacode"] . "</td>";
      echo "<td>" . $row["number"] . "</td>";
      echo "<td><a href='phonedelete.php?id=" . $row["id"] . "'>DEL</a></td>";
      echo "<td><a href='phoneupdateview.php?id=" . $row["id"] . "&customerid=". $_REQUEST["id"] . "'>EDIT</a></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='phoneupdateview.php?customerid=". $_REQUEST["id"] . " '>Add New</a></br></br>";


$sql = "select id,street,city,state,zipcode from address a inner join zipcode z on a.zipcode = z.code  where customer_id= " . $_REQUEST["id"];
echo "<table border=1><tr><th>Street</th><th>City</th><th>State</th><th>Zipcode</th><th></th><th></th></tr>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["street"] . "</td>";
      echo "<td>" . $row["city"] . "</td>";
      echo "<td>" . $row["state"] . "</td>";
      echo "<td>" . $row["zipcode"] . "</td>";
      echo "<td><a href='addressdelete.php?id=" . $row["id"] . "'>DEL</a></td>";
      echo "<td><a href='addressupdateview.php?id=" . $row["id"] . "&customerid=". $_REQUEST["id"] ."'>EDIT</a></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='addressupdateview.php?customerid=". $_REQUEST["id"] . " '>Add New</a></br></br>";

$sql = "select id,DATE_FORMAT(`date`,'%W %M %Y') whenordered from `order` where customer_id= " . $_REQUEST["id"];


echo "<table border=1><tr><th>Order Id</th><th>Date</th><th></th><th></th></tr>";
if($result = $mysqli->query($sql)) {
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["whenordered"] . "</td>";
      echo "<td><a href='orderdelete.php?id=" . $row["id"] . "'>DEL</a></td>";
      echo "<td><a href='orderupdateview.php?id=" . $row["id"] . "&customerid=". $_REQUEST["id"] . "'>EDIT</a></td>";
      echo "</tr>";
  }
}
echo "</table>";
echo "<a href='orderupdateview.php?customerid=". $_REQUEST["id"] . " '>Add New</a></br></br>";

include "footer.php";
?>