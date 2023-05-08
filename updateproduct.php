<?php
require "Product.php";

$product = new Product();
$product_id = $_GET['id'];
$product_details = $product->get_product_by_id($product_id);



?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Update Product</title>
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

   <div class="mt-4 mb-4 col-md-10 offset-2">
   <form action="products.php" method="post" id="form">
   <div class="row col-md-8 mt-4">
        <label for ="name">Fullname:
        <input type="text" id="name" name="name"class="form-control"placeholder = <?php echo $product_details['name']?> >
        </div>
        <div class="row col-md-8">
        <label for ="description">Description:
        <textarea class="form-control" type="text" id="description" name="description" rows ="3" ><?php echo $product_details["description"]?></textarea>
        </div>
        <div class="row col-md-8">
        <label for ="price">Price:
        <input type="number" id="price" name="price" class="form-control" placeholder = <?php echo $product_details['price']?>> 
        </div>
        <br>
        <div class="row col-md-4 offset-2">
        <input type="submit" class= "btn btn-primary" value='update' name='submit' id="submit">
        </div>
        </form>
</div>
   </div>
      </div>
</body>
</html> 