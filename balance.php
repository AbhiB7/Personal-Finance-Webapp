<?php
include_once 'connect.php';
    
	$table = $_SESSION['table'];
	

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <title>Balance - Personal Finance</title>
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="css/style.css" rel="stylesheet" type="text/css">
      <!-- <link href="css/responsive.css" rel="stylesheet" type="text/css"> -->
      <link href="css/style.php" rel="stylesheet" type="text/css">
      
  </head>
  <body>
      <section>
          <div class="container" class="col-lg-12" class="balance_margin">
    <?php
   

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
              
    print "<h4><strong>Total Balance:</strong></h4><h3><strong>" .$totbalance. "</strong></h3>";
    print "<h4><strong>Total Income:</strong></h4><h3><strong>" .$totincome. "</strong></h3>";
    print "<h4><strong>Total Expenditure:</strong></h4><h3><strong>" .$totexpenditure. "</strong></h3>";
    if($totbalance < 0)
    {
      echo "<strong>your balance is in the negatives</strong>";
    }

    mysqli_close ($conn);
     ?>
              
          </div>
</section>
  </body>
</html>
