<style>
    form {
        width: 50%;
        margin: 0 auto;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
    }
    input[type=text], input[type=email], input[type=number] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>

<?php
include 'dbconnection.php';
session_start();
$total = $_GET['total'];


if(isset($_POST['checkoutBtn'])){
    $name = $_POST['customer_name'];
$email = $_POST['customer_email'];
$address = $_POST['customer_address'];
$total = $_POST['total_price'];

$sql = "INSERT INTO orders (customer_name, customer_email, customer_address, total_price) VALUES ('$name', '$email', '$address', '$total')";
$con->query($sql);
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: placeorder.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
?>


<h2 align="center" style="padding:2px;">Complete your order!</h2>

       
<form method="POST" action="">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="customer_email" id="customer_email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="customer_address" id="customer_address" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="total">Total</label>
        <input type="text" name="total_price" id="total_price" value="Rs. <?php echo $total ?>" class="form-control" readonly>
    </div>
    <div class="form-group">
        <button type="submit" name="checkoutBtn" class="btn btn-success">Checkout</button>
    </div>
</form>
