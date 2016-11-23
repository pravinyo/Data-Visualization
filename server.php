<?php
session_start();
$message=array();
require('database.php');

$query="SELECT * FROM ratings";
$result=mysqli_query($connect,$query) or die('Data fetching error');
$name=array();
$votes=array();
$rating=array();
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	array_push($name,substr($row["image"],30));
	array_push($votes,$row["votes"]);
	array_push($rating,$row["rated"]);
}
$message["image"]=$name;
$message["votes"]=$votes;
$message["rating"]=$rating;

header('content-type:application/json');
echo json_encode($message);
?>