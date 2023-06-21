
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
   <div class="container mt-4 mb-4">
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightblue">
   <div class="container-fluid">
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2">
       <li>
        <a href="cart.php" class= "btn btn-primary">My Cart </a>
        <a href="productlist.php?logout=true" class= "btn btn-danger">Log Out </a>
        <a href="updatepassword.php">forget or change password? </a>
        </li>
      </ul>
      <form action="productlist.php" class="d-flex" method="GET" enctype="multipart/form-data" id="form">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
  </form>
    </div>
  </div>
</nav> 

</body>
</html> 