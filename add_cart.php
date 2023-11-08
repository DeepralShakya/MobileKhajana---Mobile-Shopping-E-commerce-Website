<?php
include 'dbconnection.php';
	session_start();

		
// First, check if the user is logged in 
if (isset($_SESSION['username'])) { 
   // The user is logged in, so they can add an item to the cart 
    // Code to add an item to the cart




	//check if product is already in the cart
	if(!in_array($_GET['id'], $_SESSION['cart'], )){
		array_push($_SESSION['cart'], $_GET['id']);
		$_SESSION['message'] = 'Product added to cart';
	}
	else{
		$_SESSION['message'] = 'Product already in cart';
	}

	header('location: product.php');
} else { 
    // The user is not logged in, so redirect them to the login page 
	
	
	
    header("Location: login.php");
    exit; 
}

	
?>