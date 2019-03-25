<?php
	session_start();
include 'config.php';
session_set_cookie_params ( 1200, '/', '', TRUE, TRUE );

function checklogin($username,$password)
{
		$sql = "SELECT user_id,password FROM users WHERE user_id='$username' AND password='$password'";
		//just debug
		//echo "sql = $sql<br><br>";

		global $mysqli;
		$result = $conn->query($sql);
		// echo $result;
		if($result->num_rows > 0){
			return TRUE;
					}
					else
					{
			return FALSE;
		}
	}
if($_POST['submit'])
{
if(isset($_POST['username']) && isset($_POST['password']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
// 	$username = mysql_real_escape_string($username);
// $password = mysql_real_escape_string($password);
	if(checklogin($username,$password))
{
echo 'pt1';
	$_SESSION['logged']=TRUE;
	$_SESSION['username']=$_row['username'];
		echo $_row['username'];
		// echo $_POST['password'];
		// echo 'point1';
}
}
}
//

$sql = "SELECT user_id,password FROM users WHERE user_id='$username' AND password='$password'";
		//just debug
		//echo "sql = $sql<br><br>";

		global $mysqli;
		$result = $conn->query($sql);
		// echo $result;
		if($result->num_rows > 0){
			echo 'true';
		}else{
			echo 'false';
		}
?>