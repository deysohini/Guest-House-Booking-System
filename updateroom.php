<?php
include('db_connect.php');
$roomno=$_POST['roomno'];
$sql="SELECT * FROM room WHERE='".$roomno."'";
$sth=$dbh->prepare($sql);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_OBJ);
echo "<form method='POST' action='update_process.php'/>";
echo "Room Number: <input type=number name="roomno" value="'.$roomno.'" readonly/>";
echo "Avaliability: <input type="text" name="avaliability" value="'.$result[0]->avaliability.'" />" ; 
echo "<button type="submit" value="Submit"> Submit </button>";
echo "</form>"
?>
