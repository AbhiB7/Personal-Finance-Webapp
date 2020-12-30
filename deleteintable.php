<?php
include_once 'connect.php';
session_start();
$table = $_SESSION['table'];
$id1=$_GET['rn'];
echo $id1;
$sql="delete from $table where id = '$id1'; ";
$querydelete = mysqli_query($conn,$sql);
header("LOCATION:index.php?transaction=successful");
 ?>
