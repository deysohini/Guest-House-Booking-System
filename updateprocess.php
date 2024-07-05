<?php
include('db_connect.php');
$roomno=$_POST['roomno'];
$avaliability=$_POST['avaliability'];
$sql="UPDATE room SET avaliability='".$avaliability>"' WHERE roomno='".$roomno."'";
$sth=$dbh->prepare($sql);
$sth->execute();
?>
<form action="rs.php">
<button type="submit"> Result </button>