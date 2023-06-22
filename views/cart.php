<?php
session_start();
include "header.php";
include '../model/Product.php';

$msg = "";
$product = new Product();
$product_list = $product->check_product_in_cart();


if(isset($_GET['delete'])){

  $product = new Product();
  $order_id = $_GET['id'];
  $order_delete = $product->order_del($order_id);

  if($order_delete == false || $order_delete == null){
     $msg ='<div class="alert alert-danger">order delete failed!</div>';
      
  }else{
     $msg ='<div class="alert alert-success">Delete order successfully!</div>';
  }
}
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

   <?php
      if($msg !== ""){ ?>
        <?= $msg ?>
     <?php } ?>

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
      <td><a href="http://localhost/kitchen/views/cart.php?delete=true&&id=<?=$product['order_id']?>"class="btn btn-danger">Delete</a>
    </tr>
   <?php } ?>
  </tbody>
</table>     

</div>
      </div>
</body>

</html> 