<style>
  /* Add some spacing and a background color */
  body {
    padding: 20px;
    background-color: #f5f5f5;
  }

  /* Center the text and add some padding */
  .text-center {
    text-align: center;
    padding: 20px;
  }

  /* Add some font-size and margin to the title */
  .display-4 {
    font-size: 3em;
    margin-bottom: 20px;
  }

  /* Add some color to the success message */
  .text-success {
    color: green;
  }

  /* Add some color to the danger message */
  .text-danger {
    color: red;
  }
  
  /* Style the "Done" link */
  a {
    font-size: 1.5em; /* Increase the font size */
    color: blue; /* Change the text color */
    text-decoration: none; /* Remove the underline */
    border: 2px solid blue; /* Add a border */
    padding: 10px 20px; /* Add some padding */
    border-radius: 10px; /* Add rounded corners */
    transition: all 0.2s ease-in-out; /* Add a hover effect */
    display: inline-block; /* Display the link as an inline-block element */
    margin: 20px auto; /* Center the link horizontally */
  
  }

  /* Style the "Done" link when hovered */
  a:hover {
    background-color: blue; /* Change the background color */
    color: white; /* Change the text color */
  }
</style>


<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['username'])){
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phonenumber'];
$pmode = $_SESSION['pmode'];
$grand_total = $_SESSION['total'];

$data = '';
$data .= '<div class="text-center">
<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
<h2 class="text-success">Your Order Placed Successfully!</h2>

<h4>Your Name : ' . $name . '</h4>
<h4>Your E-mail : ' . $email . '</h4>
<h4>Your Phone : ' . $phone . '</h4>
<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
<h4>Payment Mode : ' . $pmode . '</h4>

</div>';
echo $data;
?>
<div class="text-center">
<a href="done.php">Done</a>
<?php }else{
    echo "No data available";
} ?></div