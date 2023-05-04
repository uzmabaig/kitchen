<?php
require "Product.php";

$product = new Product();
$product_id = $_GET['id'];
$product_details = $product->get_product_by_id($product_id);



?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Product detail</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- <script src="js/bootstrap.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       
</head>
<body>
<div class="container">
   <div class="row mt-4">
   
   <div class="card" style="width: 18rem;">
   <div class="card-body">
    <h5 class="card-title"><?php echo $product_details['name'] ?></h5>
    <p class="card-text"><?php echo $product_details['description']?></p>
    <a href="#" class="btn btn-primary"><?php echo $product_details['price']?></a>
    <a href="http://localhost/kitchen/productdelete.php?name=<?=$product_details['name']?>"class="btn btn-danger">Delete</a>
  </div>
</div>
 </div>
      </div>
</body>
</html> 

