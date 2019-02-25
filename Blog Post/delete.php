<?php 
  require 'mysql.php';
 
$id=$_REQUEST['id'];
  function handle_delete($id){
   echo "Delete post";
	$title = $_POST['title'];
	$text = $_POST['text'];
  if (isset($id) ){
	if(delete_post($id))
        echo " Post Deleted";
	else
	echo "Post not deleted";
    }else{
	echo "NO POST";
	}
	}
  handle_delete($id);
?>

<a href="index.php">Home</a>
