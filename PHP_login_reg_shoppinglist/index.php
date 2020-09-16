<?php 
session_start();
    include_once 'include/user.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:login.php");
    }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>

  <body>
    <div id="container" class="container">
      <div id="header">
        <a href="index.php?q=logout">LOGOUT</a>
      </div>
      <div id="main-body">
        <br/>
        <br/>
        <br/>
        <br/>
        <h1>
                  Hello <?php $user->get_fullname($uid); ?>
          </h1>
          <?php include("include/footer.php"); ?>
      </div>
      <div class="footer"></div>
    </div>
  </body>

  </html>