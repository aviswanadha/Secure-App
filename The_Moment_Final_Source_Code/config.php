<?php

	$conn= new mysqli('localhost', 'root', 'roottoor', 'evento');
	if($conn->connect_error) {
		die("connection failed: " .$conn->connect_error);
	}
?>
