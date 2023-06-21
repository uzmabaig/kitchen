<?php
include 'model/User.php';
session_start();

 $msg = "";
 if(isset($_GET['submit'])){
  
        $data = $_GET;
       
        $inputemail = $data["inputemail"];
        $inputpassword = $data["inputpassword"];

        if($inputemail ==  ""){
         echo "enter your valid email";
         return false;
        
         }elseif
          ($inputpassword == ""){ 
          echo "enter your valid password";
          return false;
         }

          $user= new user();
          $dbuser = $user->get($inputemail,$inputpassword);
         
          
         if(!is_array($dbuser)){
            $msg ='<div class="alert alert-danger">Login failed!</div>';
           
            }
         else {
            $_SESSION["email"] =  $data["inputemail"];
            $_SESSION["user_id"] =  $dbuser['id'];
            header("Location:productlist.php");
         }
      };
       
   ?>
<head>
<title>Usersloginform</title>
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
   <div class=" mt-4 mb-4 col-md-6 offset-3" style="background-color:lightblue" >
   <form action="userslogin.php" method="GET" enctype="multipart/form-data" id="form">
   <div class="row col-md-8 mt-4 offset-2">
   <label for ="inputemail">Email:
    <input type="email" id="inputemail" name="inputemail" class="form-control">
    </div>
    <div class="row col-md-8 offset-2">
    <label for ="inputpassword">Password:
    <input type="password" id="inputpassword" name="inputpassword" class="form-control"> 
     </div></br>
     <div class="row col-md-6 mb-4 offset-3">
     <input type="submit"class= "btn btn-primary" value='Login' name='submit' id="submit">
     </div>
  </form>
</div>
  </div>
      </div>
  
</body>
<script>