<?php
//access to varibale conn
include_once 'connect.php';
session_start();
$table = $_SESSION['table'];
echo $table;
//variable declaration
// $mysqli->real_escape_string$_POST is just to avoid errors with the variables
$date = $_POST['date'];
$income = $_POST['income'];
$expenditure = $_POST['expenditure'];
$description = $_POST['description'];

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
if(($totbalance+$income-$expenditure)<0)
{
  header("LOCATION:index.php?balance=negative");
  exit();
}
if($income < 0||$expenditure < 0)
{
  header("LOCATION:index.php?incomeOrExpenditure=negative");
  exit();
}
$sql="insert into $table(date,description,income,expenditure)values(?,?,?,?); ";

$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt,$sql))
{
  header("LOCATION:registration.php?login=somethingwentwrong");
  exit();
}
else
{
  //bind parameter to placeholder
  mysqli_stmt_bind_param($stmt, "ssdd", $date,$description,$income,$expenditure);
  //run
  mysqli_stmt_execute($stmt);

}
/*to update balance
$query = "select * from transaction";
$result = mysqli_query($conn,$query);
$balance = array(0);
$x=0;//income temp variable
$y=0;//expenditure temp variable
$i=0;//counter for while loop
while ($row = mysqli_fetch_assoc($result))
{
  $x = $row['income'] ;
  $y = $row['expenditure'] ;
  if($i==0)
  {
    $balance[$i] = $x - $y;
    $sqlone="insert into transaction(balance)values('$balance[$i]'); ";
    mysqli_query($conn,$sqlone);
  }
  else
  {
    $balance[$i] = $balance[$i-1] + $x - $y;
    $sqlone="insert into transaction(balance)values('$balance[$i]'); ";
    mysqli_query($conn,$sqlone);
  }
  $i++;
}
*/
header("LOCATION:index.php?transaction=successful");

 ?>
