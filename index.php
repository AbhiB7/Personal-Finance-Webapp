<?php
	session_start();
	$table = $_SESSION['table'];

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Personal Finance</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Start of Header_section-->
<header id="header_outer" style="background-color:#3498DB;">

<div class="center_align" >
	  <h2>FRCRCE - ECE SY</h2>
	  <!--<div class="header_section"> -->
	  <p class="span1" style="font-size: 30px; color:#ffffff;">Project: Personal Finance Web App</p> <br>
	<p style="font-size: 30px; color:#ffffff; padding:15px 15px 0px 15px;">Team Members: <br><br>
        <span style="color: antiquewhite; font-size: 28px; ">Aaron Carvalho
            <span><strong>|</strong></span> </span>
        <span style="color: antiquewhite; font-size: 28px; ">  Abhay Rajbhar
            <span><strong>|</strong></span>  </span>
        <span style="color: antiquewhite; font-size: 28px; "> Abhishek Bhattacharjee <span><strong>|</strong></span>  </span>
        <span style="color: antiquewhite; font-size: 28px; ">  Jaydeep Patil </span> </p>
	  </div>


</header>
<!--End of Header_section-->

<!--Start of Body Top_content-->

    <div class="container">
      <div class="top_content">
        <div class="row">
            <h2 style="font-size:20px;font-family:FiraSans-Regular;">Welcome to the Personal Finance Web App</h2>
               <p style="text-align:justify;color:#1E1C1B;">This App has been developed to show the personal financial transactions by a user. It will help the user monitor income and expenditure and take better decisions towards personal financial planning.</p>
            </div>
        </div>
      </div>
<!--End of Body Top_content-->

<!--Start of Body Top_content_inner-->
<section  id="service" style="padding-top:10px;">
	<div class="top_cont_inner">
    <h2 style="color:#888888;">Income and Expenditure</h2>
	</div>

<!--income-->
  <div class="container">
	  	<div class="service_area">
		  <div class="row">
			  <div class="col-lg-12">
				  	<div class="form">
					  <form action="transaction.php" method="post">
						  <h4>Date</h4>
						  <input class="input-text " type="date" name="date"  placeholder="Enter Date" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
						  <h4>Income</h4>
                            <input class="input-text " type="int" name="income" placeholder="Enter Income" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
						  <h4>Expenditure</h4>
						  <input class="input-text " type="int" name="expenditure" placeholder="Enter expenditure" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
						  <h4>Description</h4>
						  <input class="input-text " type="text" name="description" placeholder="Enter Details" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
						  <button type="submit" id="submit_button" name="submit">SUBMIT</button>
						</form>
					</div>
				</div>
			 </div>
		</div>
	 </div>
	<hr>
</section>
<div class="clear"> </div>
<!--End of Body Top_content_inner-->

<!--Start of Body Table_area-->
<!--add if needed later
<td><input class="input-btn animated wow flipInY delay-08s" type="submit" value="EDIT"></td>
  <td><input class="input-btn animated wow flipInY delay-08s" type="submit" value="Delete"></td>-->

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="table_area">
          <!--using php around the website tabel to get the values from the database table
          //add balance to table later-->
					<table style="width:100%; border: 1px solid black;">
						<h4>Transaction Table</h4>
						<tr style= "border: 1px solid black;">
							<th>Id</th>
							<th>Date</th>
							<th>Description</th>
							<th>Income</th>
							<th>Expenditure</th>
              <th>Delete</th>
            </tr>

<?php
include_once'connect.php';

$sql="select * from $table ";
$result = mysqli_query($conn,$sql);


//condition for number of rows
//give output
           while ($row = mysqli_fetch_assoc($result))
            {
                $r=$row['id'];
              echo "
              <tr>
                <td>"
                 .$row['id'].
                "</td><td>"
                .$row['date'].
                "</td><td>"
                .$row['description'].
                "</td><td>"
                .$row['income'].
                "</td><td>"
                .$row['expenditure'].
                "</td><td>
                    <a href='deleteintable.php?rn=$r'>Delete</a>
                </td>
              </tr>";
            }
          ?>
          </table>
          <br>
				</div>
			</div>
		</div>
	</div>
</section>
    <hr>
   <!--delete row text box-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                <div class="balance">
                  <?php
                  include_once'balance.php';
                   ?>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<!--delete row text box-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                <div class="delete">
                  <form  action="deleterow.php" method="post">
                    <h4><strong>Delete:</strong></h4>
                    <input class="input-text " type="int" name="deleterow" placeholder="Enter the id of the row you wish to delete" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                    <button type="submit" id="submit_button" name="submit1">SUBMIT</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
    </section>
    <hr>

<!--update row text box-->
<!--delete row text box-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                <div class="update">
                  <form  action="updaterow.php" method="post">
                    <h4><strong>Update:</strong></h4>
                    <input class="input-text " type="int" name="updaterow" placeholder="Enter the id of the row you wish to update" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                    <button type="submit" id="submit_button" name="submit2">SUBMIT</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<!--End of Body Table_area-->

<!--Start of footer_section-->
<footer class="footer_section", id="contact">
	<div class="container">
		<div class="row">
			<h3 style="text-align:center;font-size:35px; padding: 30px;"><b>Thank You</b></h3>
			<p style="text-align:center;font-size:25px; padding: 15px;"> FRCRCE - ECS SE</p>

		</div>
	</div>
</footer>
<!--End of footer_section-->

</body>
</html>
