<?php
  include_once 'connect.php';
  $usernamecheck = mysqli_real_escape_string($conn,$_POST['usernamecheck']);
  $passwordcheck = mysqli_real_escape_string($conn,$_POST['passwordcheck']);


  if(empty($passwordcheck)||empty($usernamecheck))
  {
    header("Location:login.php?error=emptyfield");
    exit();
  }

  else
  {
    $sql = "SELECT * FROM user WHERE username = ?;";
    //create prepared statement
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
      mysqli_stmt_bind_param($stmt, "s", $usernamecheck);
      //run
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while($row = mysqli_fetch_assoc($result))
      {
        $temp = password_verify($passwordcheck,$row['password']);
      }
    }

    if ($temp == true)
     {
        session_start();
        $_SESSION['table'] = $usernamecheck;


        header("LOCATION:index.php?login=successful");
        exit();
    }

    else
     {
        header("LOCATION:login.php?error=wrongpassword");
        exit();
      }

  }


 ?>
