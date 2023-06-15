<?php
session_start();

if(isset($_GET['logout'])){
 session_destroy();
  header("Location:userslogin.php");
}

     if(isset($_SESSION["email"]) && isset($_SESSION["user_id"])){
      
         echo "<h6>Wellcome to"." ".$_SESSION["email"]."</h6>";
       }else{
        header("Location:userslogin.php");
       }
 

   require "Product.php";
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
   
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightblue">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        <li>
          <a href="productlist.php?logout=true" class= "btn btn-danger">Log Out </a>
           <a href="cart.php" class= "btn btn-primary">My Cart </a>
        </li>
      </ul>
      <form action="productlist.php" class="d-flex" method="GET" enctype="multipart/form-data" id="form">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
  </form>
    </div>
  </div>
</nav>
 <div class="row mt-4">
   <?php
      if($msg !== ""){ ?>
         <?= $msg ?>
    <?php } ?>
   <?php foreach($allproducts as $product) { ?>
    <div class="card" style="width: 22rem;">
    <img src="<?= $product['image'];?>" class="card-img-top">
   <div class="card-body">
    <h5 class="card-title"><?php echo $product['name'] ?></h5>
    <p class="card-text"><?php echo $product['description'] ?></p>
    <a href="http://localhost/kitchen/productdetail.php?id=<?=$product['product_id']?>" class="btn btn-primary"><?php echo $product['price'] ?></a>
    <a href="http://localhost/kitchen/updateproduct.php?id=<?=$product['product_id']?>"class="btn btn-info">Update</a>
    <a href="http://localhost/kitchen/productlist.php?order=true&id=<?=$product['product_id']?>"class= "btn btn-success">order</a>
    <a href="http://localhost/kitchen/productdelete.php?id=<?=$product['product_id']?>"class="btn btn-danger">Delete</a>
 </div>
  </div>
<?php } ?>
</div>

        </div>  
  </body>
</html> 

