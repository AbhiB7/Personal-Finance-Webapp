<?php
include_once 'connect.php';
    session_start();
	$table = $_SESSION['table'];
	echo $table;

//php code for updating the form
$update= $_SESSION['update'];
$date2 = mysqli_real_escape_string($conn,$_POST['date']);
$income2 = mysqli_real_escape_string($conn,$_POST['income']);
$expenditure2 = mysqli_real_escape_string($conn,$_POST['expenditure']);
$description2 = mysqli_real_escape_string($conn,$_POST['description']);
$sql="select * from $table ";
$result = mysqli_query($conn,$sql);
$totincome = 0;
$totexpenditure = 0;
while ($row = mysqli_fetch_assoc($result))
{
  $totincome += $row['income'];
  $totexpenditure += $row['expenditure'];
}
$totbalance = $totincome - $totexpenditure;
if(($totbalance+$income2-$expenditure2)<0)
{
  header("LOCATION:index.php?balance=negative");
  exit();
}
$sql="UPDATE $table SET date='$date2', description='$description2', income='$income2', expenditure='$expenditure2' where id='$update'; ";
if(mysqli_query($conn,$sql))
{
header("LOCATION:index.php?update=successful");
}
else
{
    header("LOCATION:index.php?error=didnt update");
}




 ?>
