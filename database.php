<?php


	// Database connection
	$conn = new mysqli('localhost','root','','Recipe');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 

?>