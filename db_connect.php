<?php
//var_dump($_POST);empno=Emp_no&name=Name&add=Address&pwd=Password
$dsn = 'mysql:host=localhost;dbname=test;port=3307';
$username = 'root';
$password = 'usbw';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
); 

$dbh = new PDO($dsn, $username, $password, $options);
?>