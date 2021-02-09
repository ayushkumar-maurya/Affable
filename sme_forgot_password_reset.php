
<?php 
$message="";
$valid='true';
include("connection.php");
//session_start();
if(isset($_GET['key']) && isset($_GET['email'])) {
    $key=$_GET['key'];
    $email=$_GET['email'];
    $check=mysqli_query($db,"SELECT * FROM forget_password WHERE email='$email' and temp_key='$key'");
    //if key doesnt matches
    if (mysqli_num_rows($check)!=1) {
      echo "This url is invalid or already been used. Please verify and try again.";
      exit;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2=mysqli_real_escape_string($db,$_POST['password_2']);
        if ($password_2==$password_1) {
            $message_success="New password has been set for ".$email;
			$password = $_POST['password_1'];
			$hash = password_hash($password, PASSWORD_DEFAULT);
            //destroy the key from table
            mysqli_query($db,"DELETE FROM forget_password where email='$email' and temp_key='$key'");
            //update password in database
            mysqli_query($db,"UPDATE sme_profile set password='$hash' where email='$email'");
        }
        else{
            $message="Verify your password";
        }
}
        
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Reset Password</title>
  </head>
  <body>
    
          <form role="form" method="POST">
              <label>Please enter your new password</label><br><br>
              <div class="form-group">
                <input type="password"  name="password_1" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password"  name="password_2" placeholder="Re-type Password">
              </div>
                    <?php if (isset($error)) {
                      echo"Error:".$error."</div>";
                 } ?>
            <?php if ($message<>"") {
                      echo $message;
                } ?>
            <?php if (isset($message_success)) {
                      echo"Success:".$message_success;
                  } ?>
				
				<br><br>
                <button type="submit" class="btn" name="submit" >Save Password</button>
                <br><br>
                <label>This link will work only once for a limited time period.</label>
                <a href="index.php?smeSignIn=1">Back to Login</a
                <br>
          </form>
  </body>
</html>
