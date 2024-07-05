<?php
include_once("db_connect.php");
$roomno=$_POST['roomno'];
$roomtype=$_POST['roomtype'];
$avaliability=$_POST['avaliability'];
try{
	$sql="INSERT INTO room VALUES ($roomno,'$roomtype','$avaliability')";
	$sth=$dbh->prepare($sql);
	$sth->execute();
	echo "<h1> success </h1>";
}
catch (PDOException $e){
	echo $e->getmessage();}
?>
<form action="rs.php">
<button type="submit"> Result </button>