<?php
session_start();
require ('db_connect.php');
//var_dump($_POST);
$user_id = $_SESSION['user_id'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomtype= $_POST['roomtype'];
print_r($_SESSION);

$sql= "INSERT INTO customer_queue (user_id,checkin,checkout,roomtype) VALUES ($user_id,'$checkin','$checkout','$roomtype')";
echo ($sql);

$sth = $dbh->prepare($sql);
$sth->execute();
echo "<h1> Done </h>";
?>