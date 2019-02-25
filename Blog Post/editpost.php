<?php 
  require 'mysql.php';
 
$id=$_REQUEST['id'];
  function handle_edit_post($id){
   echo "Check post";
	$title = $_POST['title'];
	$text = $_POST['text'];
  if (isset($title) and isset($text) ){
	if(edit_post($id,$title,$text))

        echo " Post Updated";
	else
	echo "Post not updated";
    }else{
	echo "NO POST";
	}
	}
  handle_edit_post($id);
?>
<form action="editpost.php" method="POST" class="form post">
	<input type="hidden" name="nocsrftoken" value="<?php echo $rand;?>"/>
	Title:<input type="text" name="title" /> <br>
	text: <textarea name="text" required></textarea><br>
	<button class="button" type="submit">
		EDIT POST
	</button>
	</form>

<a href="index.php">Home</a>
