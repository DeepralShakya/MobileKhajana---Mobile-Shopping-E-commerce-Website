<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style/css/style1.css"/>
</head>
<body>
<?php
    require('../dbconnection.php');
    session_start();
    
    if (isset($_POST['admin_username'])) {
        $admin_username = stripslashes($_REQUEST['admin_username']);    // removes backslashes
        $admin_username = mysqli_real_escape_string($con, $admin_username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin_info` WHERE admin_username='$admin_username'
                     AND password='$password'";
                     
        $result = mysqli_query($con, $query) or die(mysql_error());
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        $_SESSION["uid"] = $row["admin_id"];
        $_SESSION["name"] = $row["admin_username"];
        

        if ($count ==1) {
            $_SESSION['admin_username'] = $admin_username;
            // Redirect to admin dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="admin_username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
       
  </form>
<?php
    }
?>
</body>
</html>
