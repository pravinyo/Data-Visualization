<?php
$DBServer='host url';
$DBUser='Username';
$DBPassword='password';
$DBName='database name';

$connect=new mysqli($DBServer,$DBUser,$DBPassword,$DBName);
if($connect->connect_error)
{
	die('Connection Error: ' . $connect->connect_error);
}
?>
