<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Personal Finance</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">

    <title>registration page</title>
  </head>
  <body>
    <div class="col-lg-12">
      <p>Register Here</p>

      <form action="registration_dbcode.php" method="post">
        <h4>Username</h4>
        <input class="input-text " type="text" name="username" placeholder="Enter username" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
        <h4>Password</h4>
        <input class="input-text " type="text" name="password" placeholder="Enter Income" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
        <button type="submit" id="submit_button" name="registersubmit">REGISTER</button>
      </form>
    </div>
    <br>
    <a href="login.php">Login</a>

  </body>
</html>
