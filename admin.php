<?php
session_start();
include_once('db_connect.php');

$user_id=$_POST['user_id'];
$pwd=$_POST['pwd'];

$sql="SELECT user_id FROM usertable WHERE user_id='".$user_id."' AND pwd='".$pwd."' AND admin='y'";
$sth=$dbh->prepare($sql);
$sth->execute();
$result=$sth->fetch(PDO::FETCH_OBJ);

if($result){
	$_SESSION['user_id']=$user_id;
	echo "<br/><br/><br/><div style='text-align:center; margin-top: 80px:'>";
	echo "<h1> Welcome ".$result->user_id." </h1>";
	echo "<center><a href='cq.php'> Check Queue </a></center><br/>";
	echo "<center><a href='rs.php'> Check Room Status </a></center><br/>";
	echo "<center><a href='br.php'> Check Booked Room </a></center>";
	}
else{
	echo "user not found";
}
?>