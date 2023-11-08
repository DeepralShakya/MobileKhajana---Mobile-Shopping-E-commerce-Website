<?php
include 'dbconnection.php';
	session_start();
?>
<!DOCTYPE html>	
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<br>
<a href="index.php" class="btn btn-primary"> Home</a><br><br>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	     
	      <a class="navbar-brand" href="view_cart.php">Shopping Cart</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!-- left nav here -->
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li class="active"><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<h1 class="page-header text-center">Cart Details</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<form method="POST" action="save_cart.php">
			<table class="table table-bordered table-striped">
				<thead>
					<th></th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						 $sql = "SELECT * FROM products WHERE product_id IN (".implode(',', $_SESSION['cart']).")";
						$query = $con->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									<td>
										<a href="delete_item.php?id=<?php echo $row['product_id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
									<td><?php echo $row['product_title']; ?></td>
									<td><?php echo number_format($row['product_price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['product_price'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['product_price']; ?>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2); ?></b></td>
					</tr>
				</tbody>
			</table>
			<a href="product.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			<button type="submit" class="btn btn-success" name="save">Save Changes</button>
			<a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
			<a href="checkoutt.php?total=<?php echo $total; ?>" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
			</form>
		</div>
	</div>
</div>
</body>
</html>