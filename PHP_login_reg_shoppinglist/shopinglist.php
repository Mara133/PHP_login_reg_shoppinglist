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
include "action.php";

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Website</title>
<link rel="stylesheet" href="" type="text/css" />
<script type="text/javascript"></script>
</head>

<body  style = "min-height:100% !important;"   >

<div class="container">
<div class="jumbotron" 	 style = "background-color: #77c4d1 !important;" ;
>
<h1>Book list <small>choise your favorite</small></h1>
<a href="index.php?q=logout">LOGOUT</a>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Enter book name</div>
<div class="panel-body">
<?php
if(isset($_GET["update"])){

$id = $_GET["id"] ?? null;
$where = array("id"=>$id,);
$row = $obj->select_record("books",$where);  
?>
<form method="post" action="action.php">
<table class="table table-hover">
<tr>
<td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
</tr>
<tr>
<td>Book Name</td>
<td><input type="text" class="form-control" value="<?php echo $row["book_name"]; ?>" name="name" placeholder="Enter book name"></td>
</tr>
<tr>
<td>Quantity</td>
<td><input type="text" class="form-control" name="qty" value="<?php echo $row["qty"]; ?>" placeholder="Enter Quantity"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="edit" value="Update"></td>
</tr>
</table>
</form>

<?php
}else{
?>
<form method="post" action="action.php">
<table class="table table-hover">
<tr>
<td>Book Name</td>
<td><input type="text" class="form-control" name="name" placeholder="Enter book name"></td>
</tr>
<tr>
<td>Quantity</td>
<td><input type="text" class="form-control" name="qty" placeholder="Enter Quantity"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Store"></td>
</tr>
</table>
</form>


<?php
}

?>


</div>
</div>
</div>
<div class="col-md-3"></div>
</div>

</div>

<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<table class="table table-bordered">
<tr>
<th>#</th>
<th>Book Name</th>
<th>Available Stock</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php
$myrow = $obj->fetch_record("books");
foreach ($myrow as $row) {

?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["book_name"]; ?></td>
<td><b><?php echo $row["qty"]; ?></b></td>
<td><a href="shopinglist.php?update=1&id=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a></td>
<td><a href="action.php?delete=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
</tr>


<?php
}

?>
<?php include("include/footer.php"); ?>
</body>
