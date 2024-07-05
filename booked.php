<?php
include_once('db_connect.php');

$user_id=$_POST['user_id'];
$sql= "SELECT user_id FROM usertable where user_id=$user_id";
echo ($sql);
$sth=$dbh->prepare($sql);
$sth->execute();
$result=$sth->fetch(PDO::FETCH_OBJ);
$id=$result->user_id;

$sql= "select * from customer_queue where user_id=$user_id";
$sth=$dbh->prepare($sql);
$sth->execute();
$result=$sth->fetch(PDO::FETCH_OBJ);
$checkin = $result->checkin;
$checkout = $result->checkout;
$roomtype =$result->roomtype;

$sql= "SELECT roomno FROM room WHERE avaliability='y' AND roomtype ='".$roomtype."'";
echo ($sql);
$sth=$dbh->prepare($sql);
$sth->execute();
$result=$sth->fetch(PDO::FETCH_OBJ);
$roomno = $result->roomno;

$sql= "INSERT INTO booked VALUES ($roomno,$id,'$checkin','$checkout')";
echo ($sql);
$sth=$dbh->prepare($sql);
$sth->execute();

$sql= "DELETE FROM customer_queue WHERE user_id='".$user_id."'";
echo ($sql);
$sth=$dbh->prepare($sql);
$sth->execute();

$sql="SELECT * FROM booked";
echo ($sql);
$sth=$dbh->prepare($sql);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_OBJ);
?>


<div style='display:flex;text-align:center;justify-content: center;align-item: center'>
<div style="padding: 20px">
<table border= 1>
<tr>
<td>Room No</td>
<td>User id</td>
<td>Check-in</td>
<td>Check-out</td>
</tr>

<?php
foreach ($result as $value){
	echo "<div style='display=flex;flex-direction:column;padding:0 15px 0 15px'>";
	echo "<tr>";
	echo "<td>".$value->roomno."</td>";
	echo "<td>".$value->user_id."</td>";
	echo "<td>".$value->checkin."</td>"; 
	echo "<td>".$value->checkout."</td>";
echo "</tr>";
}
?>
</table>