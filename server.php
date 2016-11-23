<?php
/*
*	create new session for the user
*/
session_start();
$message=array();
/*
*	load the database connection file
*/
require('database.php');
/*
*	Prepare query
*/
$query="SELECT * FROM ratings";
$result=mysqli_query($connect,$query) or die('Data fetching error');
$name=array();
$votes=array();
$rating=array();
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	/*
	*	push the data in array
	*/
	array_push($name,substr($row["image"],30));
	array_push($votes,$row["votes"]);
	array_push($rating,$row["rated"]);
}
$message["image"]=$name;
$message["votes"]=$votes;
$message["rating"]=$rating;
/*
* set the header
*/
header('content-type:application/json');
/*
*  convert the associate array in to json form and send the data with the above header type
*/
echo json_encode($message);
?>
