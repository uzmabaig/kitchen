<?php
require 'Product.php';

$product = new product();
$msg = "";

if(isset($_POST['submit'])){

    $data = $_POST;
     $errors= array();

   if(isset( $_FILES['image']['name'])){
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
    
      $file_ext=strtolower(explode('.', $file_name)[1]);
      $extensions= array("jpeg","jpg","png");
    }
    // Validation 
      
    if($data['name'] == '' || !preg_match('/[a-zA-Z ]/',$data['name'])){
      echo 'Please enter valid name';
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

     

    if(in_array($file_ext,$extensions) === false){
          // $errors['image_error']="extension not allowed, please choose a JPEG or PNG file.";
          $msg = '<div class="alert alert-danger">extension not allowed, please choose a JPEG or PNG file!</div>';
    }
       
    if(empty($msg)==true){
      $name=time(); // set with time
      $location = 'images/'; 
      // $uploaddir = "../img/";
$uploadfile = $location .$name. basename($file_name);
// move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
// $fpath=$_FILES['userfile']['name'];
           
          move_uploaded_file($file_tmp,$uploadfile);
          $data = [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $uploadfile,
            'date'=> date('y-m-d H:i:s')
             ];
          $add_products= $product->add($data);
          $msg ='<div class="alert alert-success">Save product successfully!</div>';
    }

   
        // $product = new product();
        // $add_products= $product->add($data);
     
    
    //  if($add_products == false){
    //       $msg = '<div class="alert alert-danger">Save product failed!</div>';
         
    //   }else{
    //         $msg ='<div class="alert alert-success">Save product successfully!</div>';
    //      }
        
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
   <?php
      if($msg !== ""){ ?>
         <?= $msg ?>
    <?php } ?>
        
    <div class=" mt-4 mb-4 col-md-8 offset-2" style="background-color:cadetblue" >
   <form action="products.php" method="POST" enctype="multipart/form-data" id="form">
   <div class="row col-md-8 mt-4 offset-2">
        <label for ="name">Fullname:</label>
        <input type="text" id="name" name="name"class="form-control" >
        <!-- <p class="text-danger" id="valid_name"></p> -->
        </div>
        <div class="row col-md-8 mt-4 offset-2">
        <label for ="description">Description:</label>
        <textarea class="form-control" type="text" id="description" name="description" rows ="5"></textarea>
        <!-- <p class="text-danger" id="valid_decription"></p> -->
        </div>
        <div class="row col-md-8 mt-4 offset-2">
        <label for ="price">Price:</label>
        <input type="number" id="price" name="price" class="form-control"> 
        <!-- <p class="text-danger" id="valid_price"></p> -->
        </div>
        <div class="row col-md-8 mt-4 offset-2">
        <input type="file" name="image" id="image"class="form-control">
        <!-- <p class="text-danger" id="valid_image"></p> -->
        </div>
        <br>
        <div class="row col-md-6 mb-4 offset-3">
        <input type="submit" class= "btn btn-primary" value='submit' name='submit' id="submit">
        </div>
        </form>
</div>
        </div>
      </div>
</body>

</html> 