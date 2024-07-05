<?php
session_start();
require('db_connect.php');
if(isset($_SESSION['user_id']))
{
	$sql="SELECT * FROM booked";
	$sth=$dbh->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_OBJ);



echo "<div style='display:flex;text-align:center;justify-content: center;align-item: center'>";
echo "<div style='padding: 20px'>";
echo "<table border= 1>";
echo "<tr>";
echo "<td>Room No</td>";
echo "<td>User id</td>";
echo "<td>Check-in</td>";
echo "<td>Check-out</td>";
echo"</tr>";

foreach ($result as $value){
	echo "<tr>";
	echo "<td>".$value->roomno."</td>";
	echo "<td>".$value->user_id."</td>";
	echo "<td>".$value->checkin."</td>"; 
	echo "<td>".$value->checkout."</td>";
	echo "</tr>";
}
echo "</table>";
}
?>