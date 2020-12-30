<?php
  include_once'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

    //if any field is empty working fine dont worry about this
    if(empty($username)||empty($password))
    {
      header("LOCATION:registration.php?error=emptyfield");
      exit();
    }

    /*if the username already exists
   else if
    {
      $sql = "SELECT username FROM user WHERE username = ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql))
      {
        header("LOCATION:registration.php?error=username already exists");
      }

      exit();
    }*/

    //no erros execute normally
    else
    {
      //hashing the passwordcheck
      $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
      $sql="insert into user(username, password)values(?,?); ";
      $stmt = mysqli_stmt_init($conn);
      mysqli_query($conn,$sql);

      if (!mysqli_stmt_prepare($stmt,$sql))
      {
        header("LOCATION:registration.php?login=somethingwentwrong");
        exit();
      }
      else
      {
        //bind parameter to placeholder
        mysqli_stmt_bind_param($stmt, "ss", $username,$hashedpassword);
        //run
        mysqli_stmt_execute($stmt);

      }
      //create table statement taking the username as the name of the table
      $sql="create table $username (id int NOT NULL AUTO_INCREMENT, date date DEFAULT CURRENT_TIMESTAMP , description varchar(255) DEFAULT NULL, income int DEFAULT 0, expenditure int DEFAULT 0,PRIMARY KEY (id));";
      if(mysqli_query($conn,$sql))
      {
        header("LOCATION:login.php?registration=successful");
      }
      else {
        header("LOCATION:registration.php?registration=table not made");
      }
    }






 ?>
