<?php
session_start();
include "header.php";

if(isset($_GET['logout'])){
 session_destroy();
  header("Location:..\index.php");
  }

  if(isset($_SESSION["email"]) && isset($_SESSION["user_id"])){
      echo "<h6>Wellcome to"." ".$_SESSION["email"]."</h6>";
  }else{
      header("Location:..\index.php");
  }
 

   include '../model/Product.php';
   $msg = ""; 
   $product = new Product();
   $allproducts = $product->get();

   if(isset($_GET['order'])){ // for order
  
      $data = $_GET;
      $errors= array();

     $data = [
    'product_id'=>$_GET['id'],
    'user_id'=>$_SESSION["user_id"],
    'qty' => 1,
    'status' => 'pending',
    'date'=> date('y-m-d H:i:s')
   
     ];

     $add_order = $product->add_order($data);
     if($add_order !== false){
      $msg ='<div class="alert alert-success">Product had been ordered!</div>';
      }else{
      $msg = '<div class="alert alert-danger">Product order failed!</div>';
      }   
    }

    if(isset($_GET['search'])){
      $data = $_GET;
      $inputname  = $data["search"];
      $allproducts = $product->get_product_by_name($inputname);

     if(empty($allproducts)){
      $msg ='<div class="alert alert-danger">NO product found!</div>';
     }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Productlist</title>
    <link rel="stylesheet" href="views..\..\..\..\css\bootstrap.css">
    <link rel="stylesheet" href="views..\..\..\..\css\custom.css">
    <!-- <script src="js/bootstrap.js"></script> -->
    <script src="js\popper.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
       
</head>
<body>
  
 <div class ='row'>
 <?php
      if($msg !== ""){ ?>
         <?= $msg ?>
    <?php } ?>
   <?php foreach($allproducts as $product) { ?>
    <div class='col-md-4 mt-4 mb-2'>
    <div class="card" style="width: 22rem;">
    <img src="<?= $product['image'];?>" class="card-img-top" height="200px" width="300px">
    <div class="card-body">
    <h5 class="card-title"><?php echo $product['name'] ?></h5>
    <p class="card-text"><?php echo $product['description'] ?></p>
    <a href="http://localhost/kitchen/views/productdetail.php?id=<?=$product['product_id']?>" class="btn btn-primary"><?php echo $product['price'] ?></a>
    <a href="http://localhost/kitchen/views/updateproduct.php?id=<?=$product['product_id']?>"class="btn btn-info">Update</a>
    <a href="http://localhost/kitchen/views/productlist.php?order=true&id=<?=$product['product_id']?>"class= "btn btn-success">order</a>
    <a href="http://localhost/kitchen/views/productdelete.php?id=<?=$product['product_id']?>"class="btn btn-danger">Delete</a>
 </div>
  </div>
  </div>
<?php } ?>
</div>

        </div>  
  </body>
</html> 

<!-- ./ = Your current directory
../ = One directory lower
../../ = Two directories lower
../../../ = Three directories lower -->