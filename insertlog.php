<?php
session_start();
require ('db_connect.php');
 echo "<div style='background-color: #f2f2f2;'>";
//var_dump($_POST);
$user_id = $_POST['user_id'];
$pwd = $_POST['pwd'];

$sql= "select * from usertable where user_id='".$user_id."' and pwd='".$pwd."' and admin='n'";
$sth = $dbh->prepare($sql);
$sth->execute();
$result=$sth->fetch(PDO::FETCH_OBJ);
if($result)
{ 
  $_SESSION['user_id']=$user_id;
  echo "<div style='display:flex;text-align:center;justify-content: center;align-item: center;min-height: 90vh;'>";
  echo "<div style='text-align:center;display=flex;flex-direction:column;padding:0 15px 0 15px'>";
  echo "<h1> Welcome ".$result->name." </h1>";
  echo "<form method='POST' action='queue.php'; style='max width:300px;margin:0 auto;padding: 40px;background-color: #fff;border: 1px solid #ddd; border_radius:4px:'>";
  echo "<lable for='checkin'>Checkin Date</label>";
  echo "<input type='date' name='checkin' required/><br /><br/>";
  echo "<lable for='checkout'>Checkout Date</label>";
  echo "<input type='date' name='checkout' required/><br /><br/>";
  echo "<lable>Room type:</label> <br /><br/>";
  echo "<input type='radio' name='roomtype' id='DB' Value='Double Bed'/>";
  echo "<lable for='DB'>Double Bed</label><br /><br/>";
  echo "<input type='radio' name='roomtype' id='SB' Value='Single Bed'/>";
  echo "<lable for='SB'>Single Bed</label><br /><br/>";
  echo "<button type='submit' value='Submit' style='width:50%;padding:10px;background-color:#4caf50;color:#fff;border-radius:4px;cursor:pointer;'> Submit</button><br /><br/>";
  echo "<a href='check.php'> booking status </a><br/></br>";
  echo "<a href='del.php'> cancel your confirmation? </a><br/>";
  echo "</form>";
  echo "</div>";
  echo "</div>";
}
else 
{
	echo "invalid user ID or password";
}
?>
