<?php
session_start();
//initialize cart if not set or is unset
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->

    <title>MobileKhajana</title>
    <link rel="shortcut icon" href="product_images/redmi.jpg" class="icon">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
    
<style>
    #navigation {
        background: -webkit-linear-gradient(to right, #F9D423, #FF4E50);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #F9D423, #FF4E50); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    #header {
        background: #780206;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #061161, #780206);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #061209, #780200); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    #footer {
       
        background: -webkit-linear-gradient(to right, #348AC7, #7474BF);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: #1E1F29;
    }
    #bottom-footer {
      
        background: -webkit-linear-gradient(to right, #348AC7, #7474BF);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .footer-links li a {
        color: #1E1F29;
    }
    .mainn-raised {
        margin: -7px 0px 0px;
        border-radius: 6px;
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);       
    }
    .glyphicon{
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        }
        .glyphicon-chevron-left:before{
            content:"\f053"
        }
        .glyphicon-chevron-right:before{
            content:"\f054"
    }
</style>
</head>
<body>
    <!-- HEADER -->
    <header>
    <!-- TOP HEADER -->
    <div id="header">
        <div class="container">
            <div class="header-logo">
            <a href="index.php" class="logo">
        <img src="img/mobilekhajana.png" alt="">
        </a>
            </div>
            
            <nav class="navbar">
            <ul class="header-links pull-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><!-- Cart -->
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-shopping-cart"></i>
                        <span><a href="view_cart.php"> Your Cart</a></span>
                        <div class="badge qty"><span class="badge"><?php echo count($_SESSION['cart']); ?></span></div>
                    </a>
                    </li>
                <!-- /Cart -->
                           
            <li><?php
                include "dbconnection.php";
                if(isset($_SESSION["uid"])){
                    $sql = "SELECT username FROM signup WHERE id='$_SESSION[uid]'";
                    $query = mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($query);
                    
                    echo '
                    <div class="dropdownn">
                        <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Hi, '.$row["username"].'</a>
                        <div class="dropdownn-content">
                        <a href="#" data-toggle="modal" data-target="#profile"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</a>
                        <a href="logout.php"  ><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a>
                        </div>
                    </div>';
                }else{ 
                    echo '
                    <div class="dropdownn">
                        <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> My Account</a>
                        <div class="dropdownn-content">
                        <a href="login.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i>Login</a>
                        <a href="signup.php" ><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                        </div>
                    </div>';
                }
                ?>
            </li>				
            </ul>
            </nav>
        </div>
    </div>

							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		

    </header>
</body>
</html>