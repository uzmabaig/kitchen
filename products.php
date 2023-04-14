<?php
require 'Product.php';
if(isset($_POST['submit'])){

    $data = $_POST;
     $errors= array();
    
     // Validation 
    if($data['name'] == '' || !preg_match('/[a-zA-Z ]/',$data['name'])){
          echo 'Please enter valid name',
      exit;
      }
      if($data['description'] == ''){
        echo 'Please enter the product description';
        return false;
                
      }elseif
      (str_word_count($data['description']) > 100 ){
      echo 'you can use only 100 words to describe product in detail';
      return false;
       } 

       if($data['price'] == ''){
        echo 'Please enter the product price';
        return false;
        }elseif
         ($data['price'] >= 100000){
         echo 'your price of product should be under 5 digits';
         return false;
         } 

         else{
        echo "success";
       }
       $data = [
        'name' => $data['name'],
        'description' => $data['description'],
        'price' => $data['price'],
       'date'=> date('y-m-d')
        ];

        $product = new product();
        $product->add($data);
}    
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Product</title>
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
        <input type="text" id="name" name="name"class="form-control" >
        </div>
        <div class="row col-md-8">
        <label for ="description">Description:
        <textarea class="form-control" type="text" id="description" name="description" rows ="5"></textarea>
        </div>
        <div class="row col-md-8">
        <label for ="price">Price:
        <input type="number" id="price" name="price" class="form-control"> 
        </div>
        <br>
        <div class="row col-md-4 offset-2">
        <input type="submit" class= "btn btn-secondary" value='submit' name='submit' id="submit">
        </div>
        </form>
</div>
        </div>
      </div>
</body>
<script>
   <script/>

</html> 