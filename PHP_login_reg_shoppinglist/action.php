<?php

include "db.php";

class DataOperation extends Database
{
public function insert_record($table,$fileds){
$sql = "";
$sql .= "INSERT INTO ".$table;
$sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
$sql .= "('".implode("','", array_values($fileds))."')";
$query = mysqli_query($this->con,$sql);
if($query){
return true;
}

}
public function fetch_record($table){
$sql = "SELECT * FROM ".$table;
$array = array();
$query = mysqli_query($this->con,$sql);
while($row = mysqli_fetch_assoc($query)){
$array[] = $row;
}
return $array;
}
public function select_record($table,$where){
$sql = "";
$condition = "";
foreach ($where as $key => $value) {

$condition .= $key . "='" . $value . "' AND ";
}
$condition = substr($condition, 0, -5);
$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
$query = mysqli_query($this->con,$sql);
$row = mysqli_fetch_array($query);
return $row;

}
public function update_record($table,$where,$fields){
$sql = "";
$condition = "";
foreach ($where as $key => $value) {

$condition .= $key . "='" . $value . "' AND ";
}
echo $condition = substr($condition, 0, -5);
foreach ($fields as $key => $value) {

$sql .= $key . "='".$value."', ";
}
$sql = substr($sql, 0,-2);
$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
if(mysqli_query($this->con,$sql)){
return true;
}
}
public function delete_record($table,$where){
$sql = "";
$condition = "";
foreach ($where as $key => $value) {
$condition .= $key . "='" . $value . "' AND ";
}
$condition = substr($condition, 0, -5);
$sql = "DELETE FROM ".$table." WHERE ".$condition;
if(mysqli_query($this->con,$sql)){
return true;
}
}
}

$obj = new DataOperation;


if(isset($_POST["submit"])){
$myArray = array(
"book_name" => $_POST["name"],
"qty" => $_POST["qty"] 
);
if($obj->insert_record("books",$myArray)){
header("location:shopinglist.php?msg=Record Inserted");
}

}

if(isset($_POST["edit"])){
$id = $_POST["id"];
$where = array("id"=>$id);
$myArray = array(
"book_name" => $_POST["name"],
"qty" => $_POST["qty"] 
);
if($obj->update_record("books",$where,$myArray)){
header("location:shopinglist.php?msg=Record Updated Successfully");
}

}

if(isset($_GET["delete"])){
$id = $_GET["id"] ?? null;
$where = array("id"=>$id);
if($obj->delete_record("books",$where)){
header("location:shopinglist.php?msg=Record Deleted Successfully");
}


}
?>