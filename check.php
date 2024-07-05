<?php
session_start();
include_once('db_connect.php');
$user_id=$_SESSION['user_id'];

$sql= "SELECT * FROM booked where user_id='".$user_id."'";
$sth=$dbh->prepare($sql);
$sth->execute();
$result=$sth->fetch(PDO::FETCH_OBJ);

$sql= "SELECT roomtype FROM room where roomno='".$result->roomno."'";
$sth=$dbh->prepare($sql);
$sth->execute();
$value=$sth->fetch(PDO::FETCH_OBJ);
?>

<div style='display:flex;text-align:center;justify-content:center;align-item: center'>
<table border= 1>
<tr>
<td>Check-in</td>
<td>Check-out</td>
<td>Room Type</td>
</tr>

<?php
if($result)
{ 
	echo "<tr>";
	echo "<div style='display=flex;flex-direction:column;padding:0 15px 0 15px'>";
	echo "<td>".$result->checkin."</td>";
	echo "<td>".$result->checkout."</td>";
	echo "<td>".$value->roomtype."</td>";
	echo "</tr>";
	echo"</table>";
	echo"</div>";
}
else {
	echo "Confirmation is pending";
}
?>

