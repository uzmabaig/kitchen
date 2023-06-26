<?php
include "header.php";
include '../model/Product.php';

$msg = "";
$uploadfile = "";

if(isset($_GET['id'])){
  $product = new Product();
  $product_id = $_GET['id'];
  $product_details = $product->get_product_by_id($product_id);
}

if(isset($_POST['submit'])){
  
  if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
    
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    
    $file_ext=strtolower(explode('.', $file_name)[1]);
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions) === false){
      $msg = '<div class="alert alert-danger">extension not allowed, please choose a JPEG or PNG file!</div>';
    }
    
    if(empty($msg)==true){
      $name=time(); // set with time
      $location = '../images/'; 
      $uploadfile = $location .$name. basename($file_name);
      move_uploaded_file($file_tmp,$uploadfile);
      
    }
    
  }

  $product = new Product();
  $product_id = $_POST['product_id'];
  $product_details = $_POST;
  $product_details['image'] = $uploadfile;
  $product_update = $product->update_product_by_id($product_id,$product_details);
  
  
  if($product_update == false){
    $msg ='<div class="alert alert-danger">product update failes!</div>';
    
  }else{
    $msg ='<div class="alert alert-success">product updated successfully!</div>';
  }
} 
?>

<title>Update Product</title>
<div class="container">
<div class="row mt-4">
<?php
if($msg !== ""){ ?>
  <?= $msg ?>
  <?php } ?>
  
  <div class="mt-4 mb-4 col-md-10 offset-2">
  <form action="updateproduct.php" method="POST" enctype="multipart/form-data" id="form">
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
  </br>
  <div class="row col-md-8">
  <input type="file" name="image" id="image" class="form-control">
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
  <?php include "footer.php"; ?>
  
