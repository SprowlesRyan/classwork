<?php
include "header.php";
include 'questHeader.php';

$sql = "select id, name, reward, finished, Monster_id, Area_id from Quests=" . $_REQUEST["id"];


if($result = $mysqli->query($sql)) {
  if($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $reward = $row["reward"];
    $finished = $row["finished"];
    $Monster_id = $row["Monster_id"];
    $Area_id = $row["Area_id"];
  }
}
include "footer.php"
?>
<form action="questUpdate.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
name: <input type="text" name="name" value="<?php echo $name?>"><br>
reward: <input type="text" name="reward" value="<?php echo $reward?>"><br>
finished: <input type="Binary" name="finished" value="<?php echo $finished?>"><br>
Monster_id: <input type="text" name="Monster_id" value="<?php echo $Monster_id?>"><br>
Area_id: <input type="text" name="Area_id" value="<?php echo $Area_id?>"><br>
<input type="submit" value="Save">
</form>

//
// <?php
// $sql = "select id,areacode, number from phone where customer_id= " . $_REQUEST["id"];
// echo "<table border=1><tr><th>Area Code</th><th>Number</th><th></th><th></th></tr>";
// if($result = $mysqli->query($sql)) {
//   while($row = $result->fetch_assoc()) {
//       echo "<tr>";
//       echo "<td>" . $row["areacode"] . "</td>";
//       echo "<td>" . $row["number"] . "</td>";
//       echo "<td><a href='phonedelete.php?id=" . $row["id"] . "'>DEL</a></td>";
//       echo "<td><a href='phoneupdateview.php?id=" . $row["id"] . "&customerid=". $_REQUEST["id"] . "'>EDIT</a></td>";
//       echo "</tr>";
//   }
// }
// echo "</table>";
// echo "<a href='phoneupdateview.php?customerid=". $_REQUEST["id"] . " '>Add New</a></br></br>";


// $sql = "select id,street,city,state,zipcode from address a inner join zipcode z on a.zipcode = z.code  where customer_id= " . $_REQUEST["id"];
// echo "<table border=1><tr><th>Street</th><th>City</th><th>State</th><th>Zipcode</th><th></th><th></th></tr>";
// if($result = $mysqli->query($sql)) {
//   while($row = $result->fetch_assoc()) {
//       echo "<tr>";
//       echo "<td>" . $row["street"] . "</td>";
//       echo "<td>" . $row["city"] . "</td>";
//       echo "<td>" . $row["state"] . "</td>";
//       echo "<td>" . $row["zipcode"] . "</td>";
//       echo "<td><a href='addressdelete.php?id=" . $row["id"] . "'>DEL</a></td>";
//       echo "<td><a href='addressupdateview.php?id=" . $row["id"] . "&customerid=". $_REQUEST["id"] ."'>EDIT</a></td>";
//       echo "</tr>";
//   }
// }
// echo "</table>";
// echo "<a href='addressupdateview.php?customerid=". $_REQUEST["id"] . " '>Add New</a></br></br>";

// $sql = "select id,DATE_FORMAT(`date`,'%W %M %Y') whenordered from `order` where customer_id= " . $_REQUEST["id"];


// echo "<table border=1><tr><th>Order Id</th><th>Date</th><th></th><th></th></tr>";
// if($result = $mysqli->query($sql)) {
//   while($row = $result->fetch_assoc()) {
//       echo "<tr>";
//       echo "<td>" . $row["id"] . "</td>";
//       echo "<td>" . $row["whenordered"] . "</td>";
//       echo "<td><a href='orderdelete.php?id=" . $row["id"] . "'>DEL</a></td>";
//       echo "<td><a href='orderupdateview.php?id=" . $row["id"] . "&customerid=". $_REQUEST["id"] . "'>EDIT</a></td>";
//       echo "</tr>";
//   }
// }
// echo "</table>";
// echo "<a href='orderupdateview.php?customerid=". $_REQUEST["id"] . " '>Add New</a></br></br>";

// include "footer.php";
// ?>