<?php
require "Product.php";

if(isset($_GET['id'])){
    $product = new Product();
    $product_id = $_GET['id'];
    $product_details = $product->get_product_by_id($product_id);
 }

if(isset($_POST['submit'])){
    $product = new Product();
    $product_id = $_POST['product_id'];
    $product_details = $_POST;
    $product_update = $product->update_product_by_id($product_id,$product_details);
   
    //  if ($product_update  === TRUE) {
    // $result = "Record updated successfully";
    // } else {
    // $result = "Error updating record:";
    // }
  
};

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
   <form action="updateproduct.php" method="POST" id="form">
   <div class="row col-md-8 mt-4">
        <label for ="name">Fullname:</label>
        <input type="text" id="name" name="name"class="form-control" value="<?= $product_details['name']?>">
        </div>
        <div class="row col-md-8">
        <label for ="description">Description:</label>
        <textarea class="form-control" type="text" id="description" name="description" rows="3"><?= $product_details['description']?></textarea>
        </div>
        <div class="row col-md-8">
        <label for ="price">Price:</label>
        <input type="number" id="price" name="price" class="form-control" value="<?= $product_details['price']?>"> 
        </div>
        <input type="hidden" name="product_id" value='<?= $product_details["product_id"]?>'>
        </br>
        <div class="row col-md-4 offset-2">
        <input type="submit" class= "btn btn-primary" value='update' name='submit' id="submit">
        </div>
     
       </form>
</div>
   </div>
      </div>
</body>
</html> 