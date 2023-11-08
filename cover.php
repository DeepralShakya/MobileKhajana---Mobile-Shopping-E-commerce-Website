<?php
include 'dbconnection.php';
	session_start();

	
	//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	//unset qunatity
	unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	
	<style>
		.product_image{
			height:200px ;
			
		}
		.product_name{
			height:80px; 
			padding-left:20px; 
			padding-right:20px;
		}
		.product_footer{
			padding-left:20px; 
			padding-right:20px;
		}
	</style>
</head>
<body>
<div class="container"><br>
<a href="index.php" class="btn btn-primary"> Home</a><br><br>
	<nav class="navbar navbar-default">
		
	  <div class="container-fluid">
	  
	    <div class="navbar-header">
			
	      <a class="navbar-brand" href="product.php"> Shopping Cart</a>
		  <form action="" method="post">
		  <div class="form-group">
            <select class="form-control" name="category" onchange="location = this.value;">
                <option value="cover.php">Covers</option>
                <option value="product.php">All</option>
                <option value="mobile.php">Mobile</option>
				<option value="charger.php">Chargers</option>
            </select>
        </div>
	</form>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!-- left nav here -->
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	
	<?php
		//info message
		if(isset($_SESSION['message'])){
			?>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				</div>
			</div>
			<?php
			unset($_SESSION['message']);
		}
		//end info message
		//fetch our products	
		

		$sql = "SELECT * FROM products where product_cat=2";
		$query = $con->query($sql);
		$inc = 4;
		while($row = $query->fetch_assoc()){
			$inc = ($inc == 4) ? 1 : $inc + 1; 
			if($inc == 1) echo "<div class='row text-center'>";  
			?>
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row product_image">
							<img src="product_images/<?php echo $row['product_image'] ?>" width="80%" height="200px">
						</div>
						<div class="row product_name">
							<h4><?php echo $row['product_title']; ?></h4>
						</div>
						<div class="row product_footer">
							<p class="pull-left"><b>Rs.<?php echo $row['product_price']; ?></b></p>
							<span class="pull-right"><a href="add_cart.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		if($inc == 1) echo "<div></div><div></div><div></div></div>"; 
		if($inc == 2) echo "<div></div><div></div></div>"; 
		if($inc == 3) echo "<div></div></div>";
		
		//end product row 
	?>
</div>
</body>
</html>