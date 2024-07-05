<?php
include('db_connect.php');
echo '<form method="POST" action="insertroom.php">';
echo 'Room No:<input type"text" name="roomno" required/><br/>';
echo 'Room Type:<input type"text" name="roomtype" required/><br/>';
echo 'Availability: <input type="text" name="avaliability" required/><br/>';
echo '<button type="submit" value="sumit"> Result </button>';

?>