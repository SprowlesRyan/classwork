<?php
$mysqli = new mysqli('localhost', 'ryans299_ryans', 'walkersucks', 'ryans299_hunting');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '  . $mysqli->connect_error);
}
?>