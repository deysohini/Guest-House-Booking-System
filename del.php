<? php
session_start();
include_once('db_connect.php');
$user_id=$_SESSION['user_id'];
$sql="DELETE FROM booked WHERE user_id='".$user_id."'";
print_r($sql);
echo "Cancelled";
?>