<?php 
  require 'secureauthentication.php';
  //require 'mysql.php';
?>
<h2> Administration of my blog!</h2>

<a href="newpost.php">New Post</a>

<a href="changepasswordform.php">Change Password</a>

<a href="logout.php">Logout</a> 











<!-- <?php


$sql= "SELECT id, title FROM posts";
$result = $mysqli->query($sql);
 if ($result->num_rows>0)
{
while($dis =  $result->fetch_assoc())
{
$id=$dis["postid"];
echo "<br>";

echo "post title" .$dis["title"]. "<p></h3>";
			
echo '<a href= "editpost.php?id='.$dis['id'].'"><p style="text-align:center">'. "Edit a Post".'</a>';//editing
echo "<br>";
echo '<a href="deletepost.php?id='.$dis['id'].'"><p style="text-align:center">'."Delete Post".'</a><p>';//delete
}
}
?> -->

<?php
global $mysqli;
   $sql = "SELECT * FROM posts";
  echo "hi";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0){
  //output data of each row
   while($row = $result->fetch_assoc()) {
	$postid = $row["id"];
	echo "<h3>Post " . $postid . "-" . $row["title"]. "</h3>";
	echo $row["text"] . "<br>";
	echo '<a href= "editpost.php?id='.$row['id'].'">'. "Edit a Post".'</a>';
	echo '<a href= "delete.php?id='.$row['id'].'">'. "Delete a Post".'</a>';
	}
	}else{ echo "No post in this blog yet <br>";}
?>
