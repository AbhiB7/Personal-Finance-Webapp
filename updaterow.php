<?php
    include_once 'connect.php';
    session_start();
	$table = $_SESSION['table'];
	echo $table;
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update - Personal Finance</title>
      <!--  <link href="css/style.php" rel="stylesheet" type="text/css"> -->
      <link href="css/responsive.css" rel="stylesheet" type="text/css">
      <link href="css/style.css" rel="stylesheet" type="text/css">
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
    //calling all the varibales from index and from the database

      $update = $_POST['updaterow'];
      $sql = "select * from $table where id = ?;";//sql statement
      $stmt = mysqli_stmt_init($conn);
      //prepare the prepared statemetnt'
      //checking for failure first

      if (!mysqli_stmt_prepare($stmt,$sql))
      {
        header("LOCATION:index.php?login=somethingwentwrong");
        exit();
      }
      else
      {
        //bind parameter to placeholder
        mysqli_stmt_bind_param($stmt, "s", $update);
        //run
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result))
        {

          $date1 = $row ['date'];
          $income1 = $row ['income'];
          $expenditure1 = $row ['expenditure'];
          $description1 = $row ['description'];
          $_SESSION['update'] = $update;
          
        }
      }


      ?>
      <!--this is the form for updateing the entire thing -->
      <section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
                <div class="updaterow_form">

                  <form action="updaterow_code.php" method="post">
                    <h4>Date</h4>
                    <input class="input-text " type="date" name="date" value="<?php echo $date1; ?>" placeholder="Enter Date" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                    <h4>Income</h4>
                    <input class="input-text " type="int" name="income" placeholder="Enter Income" value="<?php echo $income1; ?>" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                    <h4>Expenditure</h4>
                    <input class="input-text " type="int" name="expenditure" placeholder="Enter expenditure" value="<?php echo $expenditure1; ?>" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                    <h4>Description</h4>
                    <input class="input-text " type="text" name="description" placeholder="Enter Details" value="<?php echo $description1; ?>" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                    <br>
                    <button type="submit" id="submit_button" name="submit">UPDATE</button>
                  </form>
                </div>
            </div>
        </div>
          </div>
      </section>
  </body>
</html>
