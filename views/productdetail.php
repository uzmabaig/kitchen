<?php
include "header.php";
include '../model/Product.php';

$product = new Product();
$product_id = $_GET['id'];
$product_details = $product->get_product_by_id($product_id);

$msg = "";
if($product_details !== false || $product_details !== null){
    $msg ='<div class="alert alert-success">Product detailed successfully show!</div>';
   
}else{
    $msg ='<div class="alert alert-danger">Product detail failed!</div>';
  }

?>
<title>Product detail</title>
 <div class="container">
   <div class="row mt-4">

   <?php
    if($msg !== ""){ ?>
      <?= $msg ?>
      <?php } ?>
        
<div class="card" style="width: 22rem;">
<img src="<?= $product_details['image'];?>" class="card-img-top" height="200px" width="300px">
   <div class="card-body">
  
    <h5 class="card-title"><?php echo $product_details['name'] ?></h5>
    <p class="card-text"><?php echo $product_details['description']?></p>
    <a href="#" class="btn btn-primary"><?php echo $product_details['price']?></a>
    <a href="http://localhost/kitchen/views/updateproduct.php?id=<?=$product_details['product_id']?>"class="btn btn-info">Update</a>
    <a href="http://localhost/kitchen/views/productlist.php?id=<?=$product_details['product_id']?>"class="btn btn-success">order</a>
    <a href="http://localhost/kitchen/views/productdelete.php?id=<?=$product_details['product_id']?>"class="btn btn-danger">Delete</a>
  </div>
  </div>
</div>
 </div>
 <?php include "footer.php"; ?>

