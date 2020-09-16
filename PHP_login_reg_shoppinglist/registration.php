<?php 
include_once 'include/user.php';
$user = new User();
// Checking or user is alrdy loged in or not

if (isset($_POST['submit'])){
        extract($_POST);
        $register = $user->reg_user($fullname, $uname, $upass, $uemail);
        if ($register) {
            // Registration Success
            echo "<div style='text-align:center'>Registration successful <a href='login.php'>Click here</a> to login</div>";
        } else {
            // Registration Failed
            echo "<div style='text-align:center'>Registration failed. Email or Username already exits please try again.</div>";
        }
    }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
  <link rel="stylesheet" type="text/css" href="style.css">

    <meta charset="utf-8">
 <title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>

  <body class="body">
  <div id="container" class="container col-md-6 " style = "position:relative;left:400px;width:40%;">
  </br></br></br></br>
  <div class="panel panel-primary">
      <div class="panel-heading"><center>Sign Up </center> </div>
      <div class="panel-body">
      <form action="" method="post" name="reg" class="form-group">
        Full Name<input type="text" name="fullname" class="form-control" required>
          
        Usrename<input type="text" name="uname" class="form-control" required>
        Email<input type="email" name="uemail" class="form-control" required>
        Password<input type="password" name="upass" class="form-control" required>
  </br>
       <center> <input class="btn btn-primary" type="submit" name="submit" value="Register" onclick="return(submitreg());">
        <a href="login.php">Already have an account? Click Here!</a> </center>
      </form>
    </div>

    <script>
      function submitreg() {
        var form = document.reg;
        if (form.name.value == "") {
          alert("Enter name.");
          return false;
        } else if (form.uname.value == "") {
          alert("Enter username.");
          return false;
        } else if (form.upass.value == "") {
          alert("Enter password.");
          return false;
        } else if (form.uemail.value == "") {
          alert("Enter email.");
          return false;
        }
      }
    </script>
 
  <?php include("include/footer.php");  ?>
  </body>

  </html>
 