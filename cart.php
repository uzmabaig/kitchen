<?php
session_start();

require "Product.php";
$product = new Product();
$product_list = $product->check_product_in_cart();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>My Cart</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- <script src="js/bootstrap.js"></script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
       
</head>
<body>
   <div class="container">
   <div class="row mt-4">
<table class="table">
  <thead>
    <tr>
      <th scope="col">product_id</th>
      <th scope="col">product_name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($product_list as $product) { ?>
   <tr>
     <td><?=$product['product_id']?></td>
      <td><?=$product['name']?></td>
      <td><?=$product['qty']?></td>
      <td><?=$product['date']?></td>
    </tr>
   <?php } ?>
  </tbody>
</table>     

</div>
      </div>
</body>

</html> 