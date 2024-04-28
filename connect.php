<?php
	$recipeName = $_POST['recipeName'];
	$ingredients = $_POST['ingredients'];
	$instructions = $_POST['instructions'];
	$imageUrl = $_POST['imageUrl'];

	// Database connection
	$conn = new mysqli('localhost','root','','Recipe');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Recipe(recipeName, ingredients, instructions, imageUrl) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $recipeName, $ingredients, $instructions, $imageUrl);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		
		$stmt->close();
		$conn->close();
		header("Location: get_info.php");
    	exit();
	}

?>
