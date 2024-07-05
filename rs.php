<?php
session_start();
include_once('db_connect.php');
$userid= $_SESSION['user_id'];
$sql="select * from room";
$sth=$dbh->prepare($sql);
$sth->execute();
$result=$sth->fetchALL(PDO::FETCH_OBJ);

echo "<div style='display:flex;text-align:center;justify-content: center;align-item: center'>";
echo "<table border= 1>";
echo "<tr>";
echo "<td>Room No</td>";
echo "<td>Room Type</td>";
echo "<td>Avaliability</td>";
echo "</tr>";

foreach ($result as $value){
	echo "<tr>";
	echo "<td>".$value->roomno."</td>";
	echo "<td>".$value->roomtype."</td>";
	echo "<td>".$value->avaliability."</td>"; 
	echo "<form method='POST' action='updateroom.php'/>";
	echo "<td><input type='submit' value='Update'></td>";
	echo "</tr>";
	echo "</form>";
}
echo "</table>";
echo "<form method='POST' action='addroom.php'>&nbsp";
echo "<input type='submit' value='Add New Room'>";
echo "</form>";

?>