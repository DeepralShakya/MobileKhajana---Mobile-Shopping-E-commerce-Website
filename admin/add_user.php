<?php

include("../dbconnection.php");

if(isset($_POST['btn_save']))
{
$username=$_POST['username'];

$email=$_POST['email'];
$password=$_POST['password'];

mysqli_query($con,"insert into signup(username, email, password) values ('$username','$email','" . md5($password) . "')") 
			or die ("Query 1 is inncorrect........");
header("location: manage_users.php"); 
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="style/js/jquery.min.js"></script>
</head>
<body>
<?php include("include/header.php"); ?>

<div class="container-fluid">
<?php include("include/side_bar.php"); ?>

  <div class="col-sm-9 " align="center">	
  <div class="panel-heading" style="background-color:#c4e17f;">
	<h1>Add User  </h1></div><br>
	
<form action="add_user.php" name="form" method="post">
<div class="col-sm-6">
    <input name="username" class="input-lg" type="text"  id="username" style="font-size:18px; width:330px" placeholder="User Name" autofocus required><br><br>
</div>
    <div class="col-sm-6">
    <input name="email" class="input-lg" type="text"  id="email" style="font-size:18px; width:330px" placeholder="Email" autofocus required><br><br>
    </div>
    <div class="col-sm-6">
<input name="user_password" class="input-lg" type="text"  id="password" style="font-size:18px; width:330px"  placeholder="Password" required><br><br>
    </div>
     
<div class="col-sm-7" style="margin:20px;margin-left:90px;">
    <button type="submit" class="btn btn-success btn-block center" name="btn_save" id="btn_save" style="font-size:18px">Submit</button></div>
</form>
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>