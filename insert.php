<?php
session_start();
include_once('db_connect.php');
//var_dump($_POST);

$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phno = $_POST['phno'];
$pwd = $_POST['pwd'];

$sql= "INSERT INTO usertable (user_id,name,email,phno,pwd) VALUES ($user_id,'$name','$email',$phno,'$pwd')";
$sth=$dbh->prepare($sql);
$sth->execute();
echo "<h1> Registered successfully </h>";
?>