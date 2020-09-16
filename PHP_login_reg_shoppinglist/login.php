<?php 
session_start();
include_once 'include/user.php';
$user = new User();

if (isset($_POST['submit'])) { 
		extract($_POST);   
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Registration Success
	       header("location:shopinglist.php");
	    } else {
	        // Registration Failed
	        echo 'Incorrect username or password';
	    }
	}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
  <link rel="stylesheet" type="text/css" href="style.css">

    <meta charset="utf-8">
        <title> Login </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
  
  </head>

  <body class="body">
    <div id="container" class="container col-md-4 " style = "position:relative;left:450px;">
</br></br></br>
      <div class="panel panel-primary">
      <div class="panel-heading"  style = "position:relative;"><center>Sign In</center> </div>
      <div class="panel-body">
      <form action="" method="post" name="login" class="form-group">
       
              Username<input type="text" name="emailusername" class="form-control" required>
              Password<input type="password" name="password" class="form-control" required></br>
             <center> <input class="btn btn-primary" type="submit" name="submit" value="Login" onclick="return(submitlogin());"> <a href="registration.php">Register</a></center>
           
          </tr>

        </table>
      </form>
      </div>
      </div>
      </div>
    </div>
    <script>
      function submitlogin() {
        var form = document.login;
        if (form.emailusername.value == "") {
          alert("Enter email or username!");
          return false;
        } else if (form.password.value == "") {
          alert("Enter password!");
          return false;
        }
      }
    </script>


  <?php include("include/footer.php"); ?>

