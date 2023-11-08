  <?php
    require 'dbconnection.php';
    
      session_start();

      if (count($_SESSION['cart']) == 0) {
        $_SESSION['message'] = 'Your cart is empty';
        header("Location: view_cart.php");
        exit;
      } 
      
      $total_get = $_GET['total'];


      if(isset($_POST['submit'])){
          $name = $_POST['customer_name'];
      $email = $_POST['customer_email'];
      $phonenumber = $_POST['phone'];
      $address = $_POST['customer_address'];
      $pmode = $_POST['payment_method'];
      $total = $total_get;
      
      $sql = "INSERT INTO orders (customer_name, customer_email, phone, customer_address, total_price, payment_method) VALUES ('$name', '$email', '$phonenumber', '$address', '$total', '$pmode')";
    
      if ($con->query($sql) === TRUE) {
          echo "New record created successfully";
          $_SESSION['email']=$email;
          $_SESSION['name']=$name;
          $_SESSION['phonenumber']=$phonenumber;
          $_SESSION['address']=$address;
          $_SESSION['pmode']=$pmode;
          $_SESSION['total']=$total;

          header("Location: placeorder.php");
          
      } else {
          echo "Error: " . $sql . "<br>" . $con->error;
      }
      }
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Checkout</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  </head>

  <body>
  

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
          <h4 class="text-center text-info p-2">Complete your order!</h4>
          <div class="jumbotron p-3 mb-2 text-center">
          
            <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
            <h5><b>Total Amount Payable : </b><?= number_format($total_get,2) ?>/-</h5>
          </div>
          <form action="" method="post" id="placeOrder">
            
            <div class="form-group">
              <input type="text" name="customer_name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
              <input type="email" name="customer_email" class="form-control" placeholder="Enter E-Mail" required>
            </div>
            <div class="form-group">
              <input type="tel" name="phone" class="form-control" pattern="[0-9]{10}" placeholder="Enter Phone" required>
            </div>
            <div class="form-group">
            <input type="tel" name="customer_address" class="form-control" placeholder="Enter Delivery Address" required>
            </div>
            <h6 class="text-center lead">Select Payment Mode</h6>
            <div class="form-group">
              <select name="payment_method" class="form-control">
                <option value="" selected disabled>-Select Payment Mode-</option>
                <option value="cod">Cash On Delivery</option>
                <option value="netbanking">Net Banking</option>
                <option value="cards">Debit/Credit Card</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

  </html>