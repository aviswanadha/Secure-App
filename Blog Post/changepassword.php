<?php 
  require 'secureauthentication.php';
  $username = $_POST['username'];
  $newpassword = $_POST['newpassword'];
  $nocsrftoken = $_POST["nocsrftoken"];
  $sessionnocsrdtoken = $_SESSION["nocsrftoken"];
//debug
  //echo "->Debug:nocsrftoken= $nocsrftoken \$sessionnocsrftoken = " .$_SESSION["nocsrftoken"];
  // $test =$nocsrftoken!=$_SESSION["nocsrftoken"]; 
   //echo "test=$test";
  if(!isset($nocsrftoken)){
  	echo "Cross-site forgery is detected!";
	die();
   }
  if (isset($username) and isset($newpassword) ){
	if($username!=$_SESSION["username"]){
        echo "Cannot change password for '$username'";
	die();
	}
       echo "Change password for '" . $_SESSION["username"] . "'";
    
    if (mysql_change_users_password($username, $newpassword)){
      echo "Success!";
    }else{
      echo "Failed!";
    }
}
else{
     echo "Cannot change password: username and password is not provided";
}


 
?>
<h2> Authenticated and active session!</h2>
<a href="index.php">Admin page </a> | <a href="logout.php">Logout</a> 
