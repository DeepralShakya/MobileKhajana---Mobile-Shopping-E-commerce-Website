<?php

include("../dbconnection.php");

session_start();

$product_id = $_GET['product_id'];
$product_title = $_GET['product_title'];
$product_desc = $_GET['product_desc'];
$product_image = $_GET['product_image'];
$product_price = $_GET['product_price'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update Product</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">


</head>
<body>
 
<?php include("include/header.php");?>
<div class="container-fluid">
<?php include("include/side_bar.php");?>
<div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
        <div class="panel-heading" style="background-color:#c4e17f">
        <h1><center>Update Product</center>  </h1>
        </div><br>
        <div class="panel-body" style="background-color:#E6EEEE;">
            <div class="col-lg-7">
                <div class="well">
                <form method="POST" enctype="multipart/form-data">
                <p>Title</p>
                <input class="input-lg thumbnail form-control" type="text" name="product_title" value="<?php echo "$product_title" ?>" id="product_name" autofocus style="width:100%" placeholder="Product Name" required>
                <p>Description</p>
                <textarea class="thumbnail form-control" type="text" name="product_desc" id="details" style="width:100%; height:100px" placeholder="write here..." required><?php echo $product_desc;?>
                </textarea>
                <p>Add Image</p>
                    <div style="background-color:#CCC">
                    <input type="file" style="width:100%" name="product_image" class="btn thumbnail" id="picture" >
                    </div>
                    <?php echo "<img src='../product_images/$product_image' class='img-thumbnail'/>";?>
                </div>
                    <div class="well">
<h3>Pricing</h3>
<p>Price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="text" class="form-control" name="product_price" id="price" value="<?php echo "$product_price" ?>" placeholder="0.00" required>
    </div><br>


    </div>
        </div>  
        <div class="col-lg-5">
        <div class="well">
<h3>Category</h3>  
<p>Product type</p>
<input type="number" name="product_type" id="product_type" class="form-control" placeholder="1 mobile,2 Cover, 3 Charger">
<br>
<p>Vendor / Brand</p>
<input type="number" name="brand" id="brand" class="form-control" placeholder="1 Redmi,2 Samsung,3 Apple,4 Oneplus">
<br>
</div>          
</div>

<div align="center">
    <button type="submit" name="submit" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button>
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px"> Update Product</button>
    </div>
        </form>
        <?php
	 
	 if(isset($_POST['submit']))
	 {
	 $update_id=$_GET['product_id'];
	 $product_title=$_POST['product_title'];	 
	 $product_desc=$_POST['product_desc'];
     $product_price=$_POST['product_price'];	 
	 $product_image=$_FILES['product_image']['name'];
	 $productimg_tmp=$_FILES['product_image']['tmp_name'];
	move_uploaded_file($productimg_tmp,"../product_images/$product_image");
	
	 $product_sql="UPDATE products SET product_title='$product_title',product_image='$product_image',product_desc='$product_desc',product_price='$product_price' where product_id='$update_id'";
	 $product_qry=mysqli_query($con,$product_sql) or die(mysqli_error());
	 if($product_qry)
	 {
	 	echo "<script>alert('Product Updated Successfully')</script>";
	 	echo "<script>window.open('products_list.php?products_list','_self')</script>";
	 }
	 }





?>
 
	</div>
</div></div></div>

</body>
</html>