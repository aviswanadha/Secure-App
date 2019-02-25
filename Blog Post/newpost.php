<?php 
  require 'mysql.php';
 // $username = $_POST['username'];
  //$newpassword = $_POST['newpassword'];
  //$nocsrftoken = $_POST["nocsrftoken"];
 //$sessionnocsrdtoken = $_SESSION["nocsrftoken"];
//debug
  //echo "->Debug:nocsrftoken= $nocsrftoken \$sessionnocsrftoken = " .$_SESSION["nocsrftoken"];
  // $test =$nocsrftoken!=$_SESSION["nocsrftoken"]; 
   //echo "test=$test";
  function handle_new_post(){
   echo "Check post";
	$title = $_POST['title'];
	$text = $_POST['text'];
  if (isset($title) and isset($text) ){
	if(new_post($title,$text))
        echo "New Post Updated";
	else
	echo "Not added a new post";
    }else{
	echo "NO POST";
	}
	}
  handle_new_post();
?>
<form action="newpost.php" method="POST" class="form post">
	<input type="hidden" name="nocsrftoken" value="<?php echo $rand;?>"/>
	Title:<input type="text" name="title" /> <br>
	text: <textarea name="text"></textarea><br>
	<button class="button" type="submit">
		ADD POST
	</button>
	</form>

<a href="index.php">Home</a>
