<?php 	
	
	$conn= new mysqli('localhost', 'root', 'roottoor', 'project');
	if($conn->connect_error) {
		die("connection failed: " .$conn->connect_error);
	}
	$sql ="SELECT fd_id, fd_name, fd_address FROM flower_decoration";
$result = $conn->query($sql);
$row =$result->fetch_assoc();
echo ' Posted on '. $row['fd_id'].'<br>'. $row['fd_name'].'<br>'. $row['fd_address'].'<br><br>';
?>
