<?php
session_start();
include_once('db_connect.php');
$userid= $_SESSION['user_id'];
$sql="select * from customer_queue";
$sth=$dbh->prepare($sql);
$sth->execute();
$result=$sth->fetchALL(PDO::FETCH_OBJ);
?>

<div style='display:flex;text-align:center;justify-content: center;align-item: center'>
<table border= 1>
<tr>
<td>Sl.No.</td>
<td>User id</td>
<td>Check-in</td>
<td>Check-out</td>
<td>Room Type</td>
</tr>

<?php
foreach ($result as $value){
    echo "<div style='display=flex;flex-direction:column;padding:0 15px 0 15px'>";
	echo "<tr>";
	echo "<td>".$value->slno."</td>";
	echo "<td>".$value->user_id."</td>";
	echo "<td>".$value->checkin."</td>"; 
	echo "<td>".$value->checkout."</td>";
	echo "<td>".$value->roomtype."</td>";
	echo "<form method='POST' action='booked.php'/>";
	echo "<td><input type='submit' value='Confirm'/></td>";
	echo '<input type="hidden" name="user_id" value="'.$value->user_id.'"/>';
	echo "</form>";
	echo "</tr>";
}
?>
</table>