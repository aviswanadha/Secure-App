
<html>
      <h1>Change the password </h1>
<?php
  //some code here
  require "secureauthentication.php";
  echo "Current time: " . date("Y-m-d h:i:sa");
//echo "Change password for '" . $_SESSION["username"] . "'";

?>
          

          <form action="changepassword.php" method="POST" class="form login">
                 <?php
$rand= bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand; ?>
<input type="hidden" name="nocrsftoken"
 value="<?php echo $rand; ?>" />
                Username: <input type="text" name="username" />  <br>
                New Password: <input type="password" name="newpassword" 
		required	paTern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).	{6,}"																
		title="Password	must has at least 6 characters with 1 number,	1 lowercase, and UPPERCASE"	1									
onchange="this.setCustomValidity(this.validity.patternMismatch?this.title:'');"/> <br>
                <button class="button" type="submit">
                  Change password
                </button>
          </form>
  </html>

