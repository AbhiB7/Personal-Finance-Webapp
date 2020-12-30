<?php
//access to varibale conn
include_once 'connect.php';
session_start();
$table = $_SESSION['table'];
echo $table;
//variable declaration
// $mysqli->real_escape_string$_POST is just to avoid errors with the variables
$del = $_POST['deleterow'];
echo "$del";
$sql="delete from $table where id = ?; ";
$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt,$sql))
{
  header("LOCATION:registration.php?login=somethingwentwrong");
  exit();
}
else
{
  //bind parameter to placeholder
  mysqli_stmt_bind_param($stmt, "s", $del);
  //run
  mysqli_stmt_execute($stmt);

}

header("LOCATION:index.php?transaction=successful");

 ?>
